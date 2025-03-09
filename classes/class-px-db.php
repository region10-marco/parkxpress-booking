<?php

class PxBookingDB
{
    private $wpdb;
    private $table_buchung;
    private $table_prices;
    private $table_blockeddays;
    private $table_places;
    public $days = 0;
    public $basePrice = 0;
    public $zuschlag_flex = 0;
    public $zuschlag_valet = 0;
    public $zuschlag_xxl = 0;
    public $abschlag_all = 0;
    public $extra_tanken = 0;
    public $extra_elektro = 0;
    public $extra_reinigung_aussen = 0;
    public $extra_reinigung_innen = 0;
    public $blocked_days;
    public $price_change_dates;
    public $coupon = false;
    public $coupon_type;
    public $coupon_amount = 0;
    public $economy_slot = 0;
    public $flex_slot = 0;
    public $valet_slot = 0;
    public $xxl_slot = 0;
    public $all_slot = 0;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_buchung = $this->wpdb->prefix . "buchung";
        $this->table_prices = $this->wpdb->prefix . "prices";
        $this->table_blockeddays = $this->wpdb->prefix . "blockeddays";
        $this->table_places = $this->wpdb->prefix . "places";
        $this->blocked_days = get_option('blocked_days');
        $this->price_change_dates = get_option('px_coupon');
    }

    public function px_get_slot_informations($check_in, $check_out)
    {
        if (empty($check_in) || empty($check_out)) {
            return ["error" => "Fehlende Parameter"];
        } elseif ($this->checkDateIsBlocked($check_in)) {
            return ["error" => "Checkin Datum ist gesperrt"];
        } elseif ($this->checkDateIsBlocked($check_out)) {
            return ["error" => "Checkin Datum ist gesperrt"];
        } else {

            $this->set_days($check_in, $check_out);
            $this->check_and_set_coupons($check_in);
            $this->set_base_price();
            $this->zuschlag_flex = $this->set_zuschlag_addtional('zuflex');
            $this->zuschlag_valet = $this->set_zuschlag_addtional('zuvalet');
            $this->zuschlag_xxl = $this->set_zuschlag_addtional('zuxxl');
            $this->abschlag_all = $this->set_zuschlag_addtional('aball');
            $this->extra_tanken = $this->set_zuschlag_addtional('extank');
            $this->extra_reinigung_aussen = $this->set_zuschlag_addtional('exrein');
            $this->extra_reinigung_innen = $this->set_zuschlag_addtional('exinn');
            $this->set_parking_slots();

            return [
                'days' => $this->days,
                'baseprice' => $this->basePrice,
                'zuschlag_flex' => $this->zuschlag_flex,
                'zuschlag_valet' => $this->zuschlag_valet,
                'zuschlag_xxl' => $this->zuschlag_xxl,
                'abschlag_all' => $this->abschlag_all,
                'extra_tanken' => $this->extra_tanken,
                'extra_elektro' => $this->extra_elektro,
                'extra_reinigung_aussen' => $this->extra_reinigung_aussen,
                'extra_reinigung_innen' => $this->extra_reinigung_innen,
                'price_economy' => $this->basePrice,
                'price_flex' => $this->calculate_price('flex'),
                'price_xxl' => $this->calculate_price('xxl'),
                'price_valet' => $this->calculate_price('valet'),
                'price_all' => $this->calculate_price('all')
            ];
        }
    }

    private function set_parking_slots() {
        return true;
    }

    private function checkDateIsBlocked($the_date)
    {
        $replace = str_replace('.', '', $the_date);
        if (array_key_exists($replace, $this->blocked_days)) {
            return true;
        }
        return false;
    }

    private function calculate_price($tarif)
    {

        if ($tarif == 'flex') {
            $price = $this->basePrice + $this->zuschlag_flex;
        } elseif ($tarif == 'valet') {
            $price = $this->basePrice +  $this->zuschlag_valet;
        } elseif ($tarif == 'xxl') {
            $price = $this->basePrice + $this->zuschlag_xxl;
        } elseif ($tarif == 'all') {
            $price = $this->basePrice + $this->extra_reinigung_aussen + $this->extra_reinigung_innen + $this->zuschlag_valet - $this->abschlag_all;
        } elseif ($tarif == 'economy') {
            $price = $this->basePrice;
        }

        return $price;
    }

    private function set_days($check_in, $check_out)
    {
        $check_in = date("Y-m-d", strtotime($check_in));
        $check_out = date("Y-m-d", strtotime($check_out));
        $days = (strtotime($check_out) - strtotime($check_in)) / 86400 + 1;
        $this->days = (int) $days;
    }

    private function set_base_price()
    {
        if ($this->days <= 21) {
            $query_price = $this->wpdb->prepare(
                "SELECT price FROM $this->table_prices WHERE day = %d",
                $this->days
            );
            $base_price = (float) $this->wpdb->get_var($query_price) ?? 0;

            if ($this->coupon) {

                if ($this->coupon_type == 2) {
                    $newprice = $base_price - $this->coupon_amount;
                } elseif ($this->coupon_type == 1) {
                    $newprice = $base_price + $this->coupon_amount;
                }
            }
        } else {
            // Basispreis für 21 Tage abrufen
            $query_price = $this->wpdb->prepare(
                "SELECT price FROM $this->table_prices WHERE day = %d",
                21
            );
            $base_price = (float) $this->wpdb->get_var($query_price) ?? 0;

            // Aufschlag pro zusätzlichen Tag abrufen
            $query_add_price = $this->wpdb->prepare(
                "SELECT price FROM $this->table_prices WHERE day = %d",
                22
            );
            $additional_price = (float) $this->wpdb->get_var($query_add_price) ?? 0;

            if ($this->coupon) {

                if ($this->coupon_type == 2) {
                    $newprice = $base_price + ($additional_price * ($this->days - 21)) - $this->coupon_amount;
                } elseif ($this->coupon_type == 1) {
                    $newprice = $base_price + ($additional_price * ($this->days - 21)) + $this->coupon_amount;
                }
            }
        }
        $this->basePrice = $newprice;
    }

    private function check_and_set_coupons($checkInDate)
    {
        $checkin = str_replace('.', '', $checkInDate);
        if (array_key_exists($checkin, $this->price_change_dates)) {

            $coupon_object = $this->price_change_dates[$checkin];
            $this->coupon = $coupon_object;
            $this->coupon_amount = $coupon_object['value'];
            $this->coupon_type = $coupon_object['type'];
        }
    }

    private function set_zuschlag_addtional($key)
    {
        $query = $this->wpdb->prepare(
            "SELECT price FROM $this->table_prices WHERE tarif = %s",
            $key
        );

        $result = (float)  $this->wpdb->get_var($query);
        return $result;
    }
}

<?php

class PxBookingDB
{
    private $wpdb;
    private $table_buchung;
    private $table_prices;
    private $table_blockeddays;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;

        $this->table_buchung = $this->wpdb->prefix . "buchung";
        $this->table_prices = $this->wpdb->prefix . "prices";
        $this->table_blockeddays = $this->wpdb->prefix . "blockeddays";
    }

    public function getParkingTypes($checkIn, $checkOut)
    {
        $newInDate = date("Y-m-d", strtotime($checkIn));
        $newOutDate = date("Y-m-d", strtotime($checkOut));

        // Gesperrte Tage prüfen
        $blockedDays = $this->getBlockedDays();
        $isBlocked = in_array($newInDate, $blockedDays) || in_array($newOutDate, $blockedDays) ? 1 : 0;

        // Buchungen abrufen
        $sql = $this->wpdb->prepare(
            "SELECT typ, COUNT(*) as count FROM {$this->table_buchung}
            WHERE (anreise <= %s AND abreise >= %s) 
               OR (anreise >= %s AND abreise <= %s) 
               OR (anreise >= %s AND anreise <= %s AND abreise >= %s) 
               OR (anreise <= %s AND abreise >= %s AND abreise <= %s)
            GROUP BY typ",
            $newInDate, $newOutDate,
            $newInDate, $newOutDate,
            $newInDate, $newOutDate, $newOutDate,
            $newInDate, $newInDate, $newOutDate
        );

        $results = $this->wpdb->get_results($sql, ARRAY_A);
        $parkingTypes = [
            "Economy" => ["count" => 0, "price" => 0],
            "Flex" => ["count" => 0, "price" => 0],
            "XXL" => ["count" => 0, "price" => 0],
            "Valet" => ["count" => 0, "price" => 0],
            "All-Inclusive" => ["count" => 0, "price" => 0]
        ];

        foreach ($results as $row) {
            switch ($row['typ']) {
                case 1:
                    $parkingTypes["Economy"]["count"] = $row["count"];
                    break;
                case 2:
                    $parkingTypes["Flex"]["count"] = $row["count"];
                    break;
                case 3:
                    $parkingTypes["XXL"]["count"] = $row["count"];
                    break;
                case 4:
                    $parkingTypes["Valet"]["count"] = $row["count"];
                    break;
                case 5:
                    $parkingTypes["All-Inclusive"]["count"] = $row["count"];
                    break;
            }
        }

        // Preise abrufen
        foreach ($parkingTypes as $key => &$type) {
            $price = $this->wpdb->get_var($this->wpdb->prepare(
                "SELECT price FROM {$this->table_prices} WHERE tarif = %s",
                strtolower(str_replace("-", "", $key))
            ));
            $type["price"] = $price ? $price : 0;
        }

        return [
            "parkingTypes" => $parkingTypes,
            "is_blocked" => $isBlocked
        ];
    }

    private function getBlockedDays()
    {
        $blockedDays = $this->wpdb->get_col("SELECT day FROM {$this->table_blockeddays}");
        return $blockedDays ? $blockedDays : [];
    }
}
?>

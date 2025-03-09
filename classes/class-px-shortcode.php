<?php

class PxShortcode
{
    public function __construct()
    {
        add_shortcode('px_buchungstool', array($this, 'px_buchungstool_shortcode'));
        add_action('init', array($this, 'start_session'));
    }

    public function start_session()
    {
        if (!session_id()) {
            session_start();
        }
    }

    public function px_buchungstool_shortcode($atts)
    {
        ob_start();
        include dirname(plugin_dir_path(__FILE__)) . '/lang/order_lang_de.php';

        // Prüfen, ob Step One abgeschlossen ist und Step Two geladen werden soll
        if (isset($_SESSION['buchung_step']) && $_SESSION['buchung_step'] == 2) {
            include dirname(plugin_dir_path(__FILE__)) . '/templates/step-two.php';
        } else {
            include dirname(plugin_dir_path(__FILE__)) . '/templates/step-one.php';
        }

        return ob_get_clean();
    }
}

<?php

class PxShortcode
{
    public function __construct()
    {
        add_shortcode('px_buchungstool', array($this, 'px_buchungstool_shortcode'));

    }


    public function px_buchungstool_shortcode($atts)
    {
        ob_start();
        include dirname(plugin_dir_path(__FILE__)) . '/lang/order_lang_de.php';
        include dirname(plugin_dir_path(__FILE__)) . '/templates/get-slot.php';


        return ob_get_clean();
    }
}
?>

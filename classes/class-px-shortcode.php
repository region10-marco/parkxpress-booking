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
        // Hier kannst du deine Klassen und Logik einbinden, z.B.:
        echo 'Test';
        return ob_get_clean();
    }
}

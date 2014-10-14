<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Base abstract controller. Shares logic between other controllers.
 */
abstract class Controller implements iController {

    /**
     * @return html
     */
    static function layout($html) {
        $tpl = Template::get();        
        $tpl->page = trim($html);

        return $tpl->fetch('layout.tpl');
    }
}
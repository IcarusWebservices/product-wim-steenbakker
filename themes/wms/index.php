<?php
/**
 * Wim Steenbakker Website
 * Index template
 * 
 * @copyright IcarusWebservices
 * @license Licensed to Wim Steenbakker
 */
class WMS_Index_Template extends PH_Template {

    public function render( $input ) {
        var_dump($input);
    }

}

return export('wms_index', [
    "class" => "WMS_Index_Template"
]);
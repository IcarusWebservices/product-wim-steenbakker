<?php
/**
 * Wim Steenbakker Website
 * Index controller
 * 
 * @copyright IcarusWebservices
 * @license Licensed to Wim Steenbakker
 */
class WMS_Index {

    public function index($params) {

        $template = PH_Loader::requestTemplate('wms_index');

        return $template;

    }

}

return export('wms_index', [
    "class" => "WMS_Index"
]);
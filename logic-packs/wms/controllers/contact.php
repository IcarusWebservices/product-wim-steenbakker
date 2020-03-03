<?php
/**
 * The contact form
 * 
 * @since 2.0.0
 */
class WMS_Contact_Controller {

    public function contact_form($parameters) {

        $template = PH_Loader::requestTemplate('wms_contact');

        return $template;

    }

}

return export('wms_contact', [
    "class" => "WMS_Contact_Controller"
]);
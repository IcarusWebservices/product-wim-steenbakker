<?php
/**
 * Controller related to posts
 * 
 * @since 2.0.0
 */
class WMS_Page_Controller {

    public function page($parameters) {
        global $q_site;
        $slug = $parameters->slug;

        $records = PH_Query::records([
            "==record_type" => "wms_page",
            "==record_status" => PUBLISHED,
            "==record_slug" => $slug,
            "==site" => isset($q_site->id) ? $q_site->id : null
        ]);

        if(count($records)>0) {
            $template = PH_Loader::requestTemplate('wms_page');

            $template->addData([
                "record" => $records[0]
            ]);
    
            $template->active_id = $slug;
    
            return $template;
        } else {
            return 404;
        }

        
    }

}

return export('wms_page', [
    "class" => "WMS_Page_Controller",
    "checkerFunctions" => [
        "checkpage" => function($p) {
            global $q_site;
            $slug = $p["slug"];

            $record = PH_Query::records([
                "==record_type" => "wms_page",
                "==record_status" => PUBLISHED,
                "==record_slug" => $slug,
                "==site" => isset($q_site->id) ? $q_site->id : null
            ]);

            if(count($record) > 0) {
                return true;
            } else return false;
            
        }
    ]
]);

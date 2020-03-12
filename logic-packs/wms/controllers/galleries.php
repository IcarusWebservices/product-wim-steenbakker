<?php
/**
 * Controller related to posts
 * 
 * @since 2.0.0
 */
class WMS_Galleries_Controller {

    public function overview($parameters) {
        global $q_site;
        
        $template = PH_Loader::requestTemplate("wms_gallery_overview");
        
        $galleries = PH_Query::records([
          "==site" => $q_site,
          "==record_type" => "wms_gallery",
          "==record_status" => "published"
        ]);
        
        if(count($galleries)>0) {
          $template->addData([
            "galleries" => $galleries
          ]);
          
          return $template;
        } else {
          return 404;
        }
    }

}

return export('wms_galleries', [
    "class" => "WMS_Galleries_Controller"
]);

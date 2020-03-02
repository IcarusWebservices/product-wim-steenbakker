<?php
/**
 * Gallery Record Type
 * 
 * @package WMS.RecordTypes
 */
class WMS_Gallery_Record_Type extends PH_Record_Type {

    public function processContent($content)
    {
        $json = json_decode($content);

        if($json) {
            return $json;
        } else {
            return false;
        }
    }

    public function saveRecord($rawEditorData, $previousRecord = null)
    {
        if($previousRecord) {
            $previousRecord->title = $rawEditorData["system:title"];
            return $previousRecord;
        } else {
            $newRecord = new PH_Record([
                "title" => $rawEditorData["system:title"]
            ]);
            return $newRecord;
        }
    }

    public function provideEditordata($content)
    {
        
    }

}

return export('wms_gallery', [
    "class" => "WMS_Event_Record_Type",
    "displayName" => "Gallery",
    "displayInAdmin" => true
]);
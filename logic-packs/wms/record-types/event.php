<?php
/**
 * Evenement Record Type
 * 
 * @package WMS.RecordTypes
 */
class WMS_Event_Record_Type extends PH_Record_Type {

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
        $content = [];
        $content["date"] = isset($rawEditorData["eventdata:date"]) ? $rawEditorData["eventdata:date"] : null;
        $content["starthour"] = isset($rawEditorData["eventdata:starthour"]) ? $rawEditorData["eventdata:starthour"] : null;
        $content["startminutes"] = isset($rawEditorData["eventdata:startminutes"]) ? $rawEditorData["eventdata:startminutes"] : null;
        $content["endhour"] = isset($rawEditorData["eventdata:endhour"]) ? $rawEditorData["eventdata:endhour"] : null;
        $content["endminutes"] = isset($rawEditorData["eventdata:endminutes"]) ? $rawEditorData["eventdata:endminutes"] : null;
        $content["description"] = isset($rawEditorData["description:textfield"]) ? $rawEditorData["description:textfield"] : null;

        if($previousRecord) {
            $previousRecord->content = json_encode($content);
            $previousRecord->title = $rawEditorData["system:title"];

            return $previousRecord;
        } else {
            $newRecord = new PH_Record([
                "title" => $rawEditorData["system:title"],
                "content" => json_encode($content)
            ]);
            return $newRecord;
        }
    }

    public function provideEditordata($content)
    {
        return [
            "eventdata" => json_decode($content),
            "description" => json_decode($content)->description
        ];
    }

}

return export('wms_event', [
    "class" => "WMS_Event_Record_Type",
    "displayName" => "Events",
    "displayInAdmin" => true
]);
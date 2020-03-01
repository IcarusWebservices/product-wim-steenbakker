<?php
/**
 * The general event field
 */
class WMS_Event_Editor_Field extends PH_Editor_Field {

    public function render($exportID, $preData)
    {
        // var_dump($preData);
        ?>
        <div class="container">
            <h2>Date</h2>
            <input type="date" name="<?= $exportID ?>:date" value="<?= isset($preData->date) ? $preData->date : null  ?>"><br><br>
            
            <h2>Time</h2>
            Start: <input type="number" name="<?= $exportID ?>:starthour" value="<?= isset($preData->starthour) ? $preData->starthour : null ?>">:<input type="number" name="<?= $exportID ?>:startminutes" value="<?= isset($preData->startminutes) ? $preData->startminutes : null ?>"><br><br>
            End: &nbsp;  <input type="number" name="<?= $exportID ?>:endhour" value="<?= isset($preData->endhour) ? $preData->endhour : null ?>">:<input type="number" name="<?= $exportID ?>:endminutes" value="<?= isset($preData->endminutes) ? $preData->endminutes : null ?>">
        </div>
        <?php
    }

    public function processRawInputData($inputdata)
    {
        return [
            "date" => $inputdata["date"],
            "starthour" => $inputdata["starthour"],
            "startminutes" => $inputdata["startminutes"],
            "endhour" => $inputdata["endhour"],
            "date" => $inputdata["endminutes"]
        ];
    }

}

return export('wms_event', [
    "class" => "WMS_Event_Editor_Field"
]);
<?php
/**
 * The general gallery field
 */
class WMS_Gallery_Editor_Field extends PH_Editor_Field {

    public function render($exportID, $preData)
    {
        ?>
        <div id="<?= $exportID ?>(items)"></div>
        <?php
        if(is_array($preData)) {
            foreach ($preData as $gal) {
                ?>
                <div class="container " data-source="<?= $gal->source ?>">
                    <img src="<?= $gal->source ?>" alt="<?= $gal->alt ?>">
                </div>
                <?php
            }
        }
        ?>
        <a href="#" class="button" id="<?= $exportID ?>(add)">Add</a>
        </div>
        <script>
            let addButton = document.getElementById("<?= $exportID ?>(add)");

        </script>
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

return export('wms_gallery', [
    "class" => "WMS_Gallery_Editor_Field"
]);
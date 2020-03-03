<?php

class WMS_Contact_Message_Record_Type extends PH_Message_Record_Type {
    // Processes content
    public function processContent($content)
    {
        return json_decode($content);
    }
    // Saves a record
    public function saveRecord($rawEditorData, $previousRecord = null)
    {
        
    }
    // Renders a message within the admin panel
    public function renderAdminPanel($record)
    {
        // var_dump($record);
        ?>
        <p>
            <div class="container">
                <h2>Info</h2>
                Van: <?= $record->processed_content->name ?><br>
                Email: <a href="mailto:<?= $record->processed_content->email ?>" class="link"><?= $record->processed_content->email ?></a>
                <h2>Message</h2>
                <?= $record->processed_content->message ?>
            </div>
        </p>
        <?php
    }
}

return export("wms_contact", [
    "class" => "WMS_Contact_Message_Record_Type",
    "displayName" => "Contact Formulieren"
]);
<?php
/**
 * The general gallery field
 */
class WMS_Gallery_Editor_Field extends PH_Editor_Field {

    public function render($exportID, $preData)
    {
        $gallery_images = [
            'https://images.unsplash.com/photo-1583064908559-91ebdcea9fcd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583067339189-4af195751579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80',
            'https://images.unsplash.com/photo-1583132648336-a4f3a079a526?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583071656098-20db4cc7a1e9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80',
            'https://images.unsplash.com/photo-1558981001-792f6c0d5068?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583132648365-db96e1ea0c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583133269959-5495d073241e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'
        ];

        ?>
        <div id="<?= $exportID ?>(items)">
            <div class="gallery-editor">
                <section class="photos-section">
                    <header class="photos-section-header">   
                        <div class="action-buttons disabled">
                            <a role="button" class="tab" title="Delete"><i class="fas fa-trash"></i></a>
                            <a role="button" class="tab" title="Options"><i class="fas fa-ellipsis-v"></i></a>
                        </div>
                    </header>
                            
                    <div class="photo-grid-container thumbnail-view grabbable-parent">
                        <?php
                        foreach ($gallery_images as $image) {
                            ?>

                            <div class="photo-grid-item">
                                <img class="photo" src="<?= $image ?>" alt="Image">
                                <div class="select-photo">
                                    <label class="control control-checkbox">
                                        <input type="checkbox">
                                        <div class="control-indicator"></div>
                                    </label>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </section>

            </div>
        </div>
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
        <script src="/admin/js/grabbable/grabbable.js"></script>
        <script>
            let addButton = document.getElementById("<?= $exportID ?>(add)");
            document.querySelector(".grabbable-parent").grabbable();

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
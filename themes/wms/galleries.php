<?php
/**
 * The page template
 * 
 * @since 2.0.0
 */
class WMS_GalleriesOverview_Template extends PH_Template {

    public function render($input)
    {
        get_template_part('header.php', [
            "active_id" => $this->active_id,
            "has_navbar" => $this->has_navbar
        ]);

        $gallery_images = [
            'https://images.unsplash.com/photo-1583064908559-91ebdcea9fcd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583067339189-4af195751579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80',
            'https://images.unsplash.com/photo-1583132648336-a4f3a079a526?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583071656098-20db4cc7a1e9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80',
            'https://images.unsplash.com/photo-1558981001-792f6c0d5068?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583132648365-db96e1ea0c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
            'https://images.unsplash.com/photo-1583133269959-5495d073241e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'
        ];
        
        if($input->__has('record')) {
            $record = $input->record;
            ?>

            <header class="banner low">
                <img src="https://jezz.tech/sites/wim/assets/img/cor_bakker_mythe.jpg" data-speed="-0.75" class="img-parallax">
                <div class="banner-content abs-centered">
                    <h1 class="title"><?= ucfirst($record->title) ?></h1>
                </div>
            </header>

            <main>
                <section>
                    <div class="gallery">
                        <section class="details-section">
                            <h1 class="heading">Gallery title!</h1>
                            <hr>
                        </section>
                        
                        <section class="photos-section">
                            <header class="photos-section-header">
                            
                            <div class="layout-tabs">
                                <a role="button" class="tab grid active" title="Thumbnail view">
                                    <i class="fas fa-th" aria-hidden="true"></i>
                                </a>
                                <a role="button" class="tab justified" title="Justified view">
                                    <i class="fas fa-th-large" aria-hidden="true"></i>
                                </a>
                            </div>
                            </header>
                            
                            <div class="photo-grid-container thumbnail-view">
                                <?php
                                foreach ($gallery_images as $image) {
                                    ?>

                                    <div class="photo-grid-item" onclick="modalHandler(event)">
                                        <img class="photo" src="<?= $image ?>" alt="Image">
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </section>

                        <section class="modal photo-overlay" onclick="closeModal()">
                            <span class="close-modal">×</span>
                            <img class="modal-content abs-centered" id="modal-photo" onclick="stopProp(event)">
                            <span class="photo-index-indicator" id="modal-pagination">7/10</span>
                        </section>

                    </div>
                </section>
                <section>
                    <div class="article-container">
                        <?php demo_render_post_full($record); ?>
                    </div>    
                </section>
            </main>
            <?php
            
            get_template_part('footer.php', []);

            $this->requested_title = $record->title . ' - Wim Steenbakker';
        }
        
    }

    public function __construct()
    {
        global $theme_folder;
        $this->requested_stylesheets = [
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/wms.css')),
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/components.css')),
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/musicplayer.css'))
        ];
        $this->requested_header_scripts = [
            request_script('https://kit.fontawesome.com/9d8cef91c5.js'),
            request_script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')
        ];
        $this->requested_body_scripts = [
            request_script(resource_resolve(RES_THEME, $theme_folder, '/js/main.js'))
        ];
        $this->active_id = 1;
        $this->has_navbar = false;
    }

}

return export('wms_galleries_overview', [
    "class" => "WMS_GalleriesOverview_Template"
]);

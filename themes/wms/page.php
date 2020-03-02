<?php
/**
 * The page template
 * 
 * @since 2.0.0
 */
class WMS_SinglePage_Template extends PH_Template {

    public function render($input)
    {
        get_template_part('header.php', [
            "active_id" => $this->active_id,
            "has_navbar" => $this->has_navbar
        ]);

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

return export('wms_page', [
    "class" => "WMS_SinglePage_Template"
]);
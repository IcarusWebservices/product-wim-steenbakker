<?php
/**
 * The posts overview template
 * 
 * @since 2.0.0
 */
class WMS_PostsOverview_Template extends PH_Template {

    public function render($input)
    {

        get_template_part('header.php', [
            "active_id" => $this->active_id
        ]);

        $records = PH_Query::records([
            "==record_type" => "demopost",
            "==record_status" => "published"
        ]);

        ?>
        <main>
            <section>
                
                <div class="masonry-title">Newest articles</div>
                <?php

                    foreach($records as $record) {
                        // var_dump($record);
                        ?>
                        <div class="article-card">
                            <?php demo_render_post($record); ?>
                        </div>
                        <?php
                    }

                ?>

            </section>
        </main>
        <?php
        
        get_template_part('footer.php', []);

        $this->requested_title = "Posts";
    }

    public function __construct()
    {
        global $theme_folder;
        $this->requested_stylesheets = [
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/wms.css')),
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/components.css'))
        ];
        $this->requested_body_scripts = [
            request_script(resource_resolve(RES_THEME, $theme_folder, '/js/main.js'))
        ];
    
    }

}

return export('demoposts_overview', [
    "class" => "WMS_PostsOverview_Template"
]);
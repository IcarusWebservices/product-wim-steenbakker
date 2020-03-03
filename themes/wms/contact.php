<?php

class WMS_Contact_Template extends PH_Template {

    public function render($input)
    {
        get_template_part('header.php', [
            "active_id" => $this->active_id,
            "has_navbar" => $this->has_navbar
        ]);

        ?>
        <header class="banner low">
            <img src="https://jezz.tech/sites/wim/assets/img/cor_bakker_mythe.jpg" data-speed="-0.75" class="img-parallax">
            <div class="banner-content abs-centered">
                <h1 class="title">Contact</h1>
            </div>
        </header>

        <main>
            <section>
                <div class="article-container">
                    <h1>Stuur een bericht naar Wim</h1>
                    <form action="<?= site_uri_resolve('/contact') ?>" method="post">
                        Naam: <input type="text" name="naam"><br>
                        Email: <input type="email" name="email"><br>
                        Bericht: <br>
                        <textarea name="message" id="" cols="30" rows="10"></textarea><br><br>
                        <input type="submit" value="Stuur">
                    </form>
                </div>    
            </section>
        </main>
        <?php
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

return export('wms_contact', [
    "class" => "WMS_Contact_Template"
]);
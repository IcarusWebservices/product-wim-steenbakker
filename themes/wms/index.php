<?php
/**
 * Wim Steenbakker Website
 * Index template
 * 
 * @copyright IcarusWebservices
 * @license Licensed to Wim Steenbakker
 */
 class WMS_Index_Template extends PH_Template {

    public function render($input)
    {
        global $theme_folder;
        // $header_image = 'http://wimsteenbakker.nl/wp-content/uploads/2012/08/Foto-met-alles-5-e1488409976753.jpg';
        $header_image = 'https://images.unsplash.com/photo-1552422535-c45813c61732?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80';

        // $header_image = resource_resolve(RES_THEME, $theme_folder, '/img/afstandsleren.jpg');

        get_template_part('header.php', [
            "active_id" => $this->active_id
        ]);

        ?>

        <header class="banner">
            <img src="<?= $header_image ?>" data-speed="-0.75" class="img-parallax" style="top: 45.8331%; transform: translate(-50%, -45.8331%);">
            <div class="banner-content masthead abs-centered fade-in">
                <div>
                    <p class="subtitle">Wim Steenbakker</p>
                    <h1 class="title">Muziekeducatie dat werkt.</h1>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, corrupti.</p>
                    <br>
                    <a class="button-2 alt" href="/wim/educatie">Meer over educatie</a>
                    <a class="button-2" href="/wim/optreden">Meer over optredens</a>
                </div>
            </div>
            <div class="scroll-down">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
        </header>

        <main role="main">
            <section class="intro">
                <div class="section-content"><!-- <div class="section-content" data-aos="fade-right"> -->
                    <img src="https://jezz.tech/sites/wim/assets/img/wim_pf_2.jpg" alt="Wim Steenbakker">
                    <div class="intro-text">
                        <div>
                            <span class="tag">Over mij</span>
                            <h1 class="title">Hallo! Ik ben Wim Steenbakker</h1>
                            <br>
                            <p><?= get_template_record('wms_index_hero_description', 'string', 'Dit is jouw korte praatje waarin je duidelijk kan maken wie je bent en wat je doet. Begin nog niet over acedemische prestaties en dergelijke, maar houd het familiair, kort en bondig. Klik hieronder om meer over mij te weten te komen!') ?></p>
                            <br><a class="button-1" href="/wim/over">Lees meer</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="services">
                <div class="section-content">
                    <h1>Meer te weten komen over Wim?</h1>
                    <p>Van concerten geven tot bijles geven, ik kan het allemaal voor u doen! Klik op de kaarten hieronder voor meer informatie.</p>
                    <div class="grid-3">
                        <a href="/wim/optreden">
                            <img src="https://images.unsplash.com/photo-1465225314224-587cd83d322b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="Optreden">
                            <div class="overlay-content">
                                <i class="fas fa-microphone-alt fa-3x"></i>
                                <p><strong>Optreden</strong></p>
                                <p>voor klassieke publieken</p>
                            </div>
                        </a>
                        <a href="/wim/educatie">
                            <img src="https://images.unsplash.com/photo-1536594527669-2f555de54e95?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Muziekles">
                            <div class="overlay-content">
                                <i class="fas fa-guitar fa-3x"></i>
                                <p><strong>Muzieklessen</strong></p>
                                <p>voor jong en oud!</p>
                            </div>
                        </a>
                        <a href="/wim/educatie">
                            <img src="https://images.unsplash.com/photo-1509228468518-180dd4864904?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="Muziekles">
                            <div class="overlay-content">
                                <i class="fas fa-calculator fa-3x"></i>
                                <p><strong>Wiskunde bijles</strong></p>
                                <p>voor iedereen</p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <section class="reviews">
                <div class="section-content">
                    <h1>Wat klanten en leerlingen zeggen</h1>
                    <br>
                    <div class="grid-3">
                        <div>
                            <i class="fas fa-quote-right fa-2x"></i>
                            <p><strong>Thomas de Jong</strong></p>
                            <blockquote>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum voluptas similique cum porro fuga molestias!"</blockquote>
                        </div>
                        <div>
                            <i class="fas fa-quote-right fa-2x"></i>
                            <p><strong>Hendrik van der Zande</strong></p>
                            <blockquote>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum voluptas similique cum porro fuga molestias!"</blockquote>
                        </div>
                        <div>
                            <i class="fas fa-quote-right fa-2x"></i>
                            <p><strong>Luuk Hesse</strong></p>
                            <blockquote>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum voluptas similique cum porro fuga molestias!"</blockquote>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact">
                <div class="section-content">
                    <p>Voor meer informatie, neem contact op met Wim Steenbakker.</p>
                    <a href="/wim/contact" class="button-2 alt">Neem contact op!</a>
                </div>
            </section>
        </main>
        
        <?php

        get_template_part('footer.php', []);

    }

    public function __construct()
    {
        global $theme_folder;
        $this->requested_stylesheets = [
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/wms.css')),
            request_stylesheet(resource_resolve(RES_THEME, $theme_folder, '/css/components.css')),
            request_stylesheet('https://unpkg.com/aos@next/dist/aos.css')
        ];
        $this->requested_header_scripts = [
            request_script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'),
            request_script('https://kit.fontawesome.com/9d8cef91c5.js')
        ];
        $this->requested_body_scripts = [
            request_script('https://unpkg.com/aos@next/dist/aos.js'),
            request_script(resource_resolve(RES_THEME, $theme_folder, '/js/aos.js')),
            request_script(resource_resolve(RES_THEME, $theme_folder, '/js/main.js'))
        ];
        $this->requested_title = "Home - Wim Steenbakker";
        $this->active_id = 'index';
    }

}

return export('wms_index', [
    "class" => "WMS_Index_Template"
]);

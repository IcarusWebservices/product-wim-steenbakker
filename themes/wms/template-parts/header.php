<?php
/**
 * Nova Theme Header.
 * 
 * Includes the Navbar and title
 */


?>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <a class="nav-logo" href="<?= uri_resolve('/wim') ?>"><img src="http://wimsteenbakker.nl/wp-content/uploads/2012/08/logo_wim_steenbakker-e1344252229717-300x110.png" alt="Wim Steenbakker"></a>
    <div class="nav-buttons">
        <?php
        get_template_part('menu.php', ["active_id" => $data["active_id"]]);
        ?>
    </div>
    <div class="nav-burger"><i class="fas fa-bars fa-2x" aria-hidden="true"></i></div>
</nav>
<?php
if(isset($data["active_id"])) {
    $active_id = $data["active_id"];
} else $active_id = null;

$menu = get_menu('main');

foreach ($menu as $item) {

    if($item->hasSubItems()) {
        ?>
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="<?= ph_pattern($item->links_to) ?>">
                <?= $item->display_text ?>
            </a>

            <div class="navbar-dropdown">
            <?php
                $subs = $item->sub_items;
                foreach ($subs as $sub) {
                    ?>

                    <a class="nav-btn<?php if ($active_id == $item->active_id) { echo ' active'; } ?>" href="<?= ph_pattern($sub->links_to) ?>"><?= $sub->display_text ?></a>

                    <?php
                }
            ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <a class="nav-btn<?php if ($active_id == $item->active_id) { echo ' active'; } ?>" href="<?= ph_pattern($item->links_to) ?>"><?= $item->display_text ?></a>
        <?php
    }

}
?>


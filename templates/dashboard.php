<div class="wrap">
    <h1>XVR Firestarter</h1>

    <?php settings_errors() ?>

    <form method="post" action="options.php">
        <?php
        settings_fields( 'xvr_firestarter_option_group' );
        do_settings_sections( 'firestarter_plugin' );
        submit_button();
        ?>_
    </form>
</div>
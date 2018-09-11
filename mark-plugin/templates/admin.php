<h1>Admin dashboard</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php
        settings_fields('mark_options_group');
        do_settings_sections('mark_plugin');
        submit_button();
    ?>
</form>
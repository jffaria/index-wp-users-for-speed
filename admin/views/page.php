<?php

/**
 * Provide an admin area view for the plugin
 *
 * This file is used to present the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/OllieJones
 *
 * @package    Index_Wp_Users_For_Speed
 * @subpackage Index_Wp_Users_For_Speed/admin/views
 */

use IndexWpUsersForSpeed\Indexer;

settings_errors( $this->options_name );
?>

<div class="wrap index-users">
    <h2 class="wp-heading-inline"><?= get_admin_page_title(); ?></h2>
    <p>
        <span><?= esc_html__( 'Approximate number of users on this entire site', 'index-wp-users-for-speed' ) ?>: </span>
        <span><?= number_format_i18n( Indexer::getNetworkUserCount(), 0 ) ?></span>
    </p>
    <!--suppress HtmlUnknownTarget -->
    <form id="index-users-form" method="post" action="options.php">
      <?php
      settings_fields( $this->options_name );
      do_settings_sections( $this->plugin_name );
      submit_button( 'Save Changes', 'primary' );
      ?>
    </form>
    <!--suppress HtmlUnknownTarget -->
    <form id="reindex-users-form" method="post" action="options.php">
      <?php
      settings_fields( $this->options_name . '-rebuild' );
      do_settings_sections( $this->plugin_name . '-rebuild-now' );
      submit_button( 'Reindex Now', 'primary' );
      ?>
    </form>
    <!--suppress HtmlUnknownTarget -->
    <form id="remove-users-form" method="post" action="options.php">
      <?php
      settings_fields( $this->options_name . '-remove' );
      do_settings_sections( $this->plugin_name . '-remove-now' );
      submit_button( 'Remove Now', 'primary' );
      ?>
    </form>
</div>



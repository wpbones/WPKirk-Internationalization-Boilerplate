<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="wp-kirk wrap">
  <h1><?php echo $plugin->Name; ?> boilerplate</h1>
  <p><?php _e('This page opens an alert with localized text for JavaScript.', 'wp-kirk'); ?></p>
  <button id="open-alert"><?php _e('Open Alert', 'wp-kirk'); ?></button>
</div>
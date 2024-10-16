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
  <h3>PHP Version <?php echo phpversion(); ?></h3>
  <p><?php _e('Below you will find an example of how to localize a ReactJS application.', 'wp-kirk'); ?></p>
  <div id="react-app"></div>
</div>
<div class="wrap">
  <h1>Trustmary Settings</h1>
  <form action="options.php" method="post">
      <?php
      settings_fields( 'trustmary_options' );
      do_settings_sections( 'trustmary-settings' );
      submit_button( 'Save Settings' );
      ?>
  </form>

  <h2>Shortcodes</h2>
  <p>You can use following Trustmary shortcodes:</p>
  <p><code>[trustmary_widget {id}]</code></p>
  <p><code>[trustmary_embed {id}]</code></p>
  <p><code>[trustmary_experiment {id}]</code></p>
  <p><code>[trustmary_survey {id}]</code></p>

  <p>Change id to correct one from <a href="https://app.trustmary.com" target="_blank">Trustmary App</a></p>
</div>

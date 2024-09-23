/**
 * Javascript sample.
 *
 * You can use this Javascript as start for your project.
 *
 */

(function ($) {

  "use strict";

  function openAlert() {
    alert(wpKirkLanguages.greeting + " " + $().jquery);
  }

  openAlert();

  $('#open-alert').on('click', openAlert);

})(jQuery);
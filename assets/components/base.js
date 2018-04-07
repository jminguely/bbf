/* global jQuery */

import navigation from './organisms/navigation/navigation';
import layout from './layout';

(($) => {
  $(document).ready(() => {
    layout();
    navigation();
  });
})(jQuery);

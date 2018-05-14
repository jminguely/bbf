/* global jQuery */

import navigation from './organisms/navigation/navigation';
import gallery from './organisms/gallery/gallery';
import layout from './layout';

(($) => {
  $(document).ready(() => {
    layout();
    gallery();
    navigation();
  });
})(jQuery);

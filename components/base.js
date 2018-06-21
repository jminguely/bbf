/* global jQuery */

import image from './atoms/image/image';
import navigation from './organisms/navigation/navigation';
import gallery from './organisms/gallery/gallery';
import layout from './layout';

(($) => {
  $(document).ready(() => {
    layout();
    image();
    gallery();
    navigation();
  });
})(jQuery);

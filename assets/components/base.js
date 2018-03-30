import svgIcons from '../icons/svg-icons';
import navigation from './organisms/navigation/navigation';

svgIcons();

(function ($) {
  $(document).ready(function () {
    navigation();
  });
})(jQuery);

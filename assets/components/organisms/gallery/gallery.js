/* globals $, PhotoSwipe, PhotoSwipeUI_Default */

export default () => {
  const $targets = $('.gallery').find('.gallery-item');

  if ($targets.length > 0) {
    const container = [];
    let index = 0;

    // Create gallery array
    $targets.each((i, element) => {
      $(element).attr('data-index', index);
      index += 1;

      const $link = $(element).find('a');
      const item = {
        src: $link.attr('href'),
        w: $link.data('width'),
        h: $link.data('height'),
      };

      container.push(item);
    });

    $targets.click((i, element) => {
      event.preventDefault();

      const $pswp = $('#pswp')[0];
      const options = {
        index: parseInt($(element).attr('data-index'), 10),
        bgOpacity: 0.85,
        showHideOpacity: true,
        history: false,
      };

      // Initialize PhotoSwipe
      const gallery = new PhotoSwipe(
        $pswp,
        PhotoSwipeUI_Default,
        container,
        options,
      );
      gallery.init();
    });
  }
};

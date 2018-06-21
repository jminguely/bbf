/* global jQuery */

export default () => {
  const navbarHeight = $('.site-header').height();

  (($) => {
    function scrollToHash(target, duration) {
      const elementY = $(target).offset().top;

      $('html, body').animate({ scrollTop: elementY - navbarHeight }, duration, () => {
        history.pushState(null, null, target);
      });
    }

    $('body').on('click', '[data-scrollto]', (e) => {
      e.preventDefault();
      const target = $(e.currentTarget).attr('href');
      scrollToHash(target, 500);
    });
  })(jQuery);
};

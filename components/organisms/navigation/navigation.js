import $ from 'jquery';

export default () => {
  $('.toggle-navigation').click((e) => {
    e.preventDefault();
    $('body').toggleClass('navigation-visible');
  });
};

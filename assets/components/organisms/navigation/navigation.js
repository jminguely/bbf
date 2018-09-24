import $ from 'jquery';

export default () => {
  console.log('la');
  console.log($('.toggle-navigation'));
  $('.toggle-navigation').on('click', function (e) {
    e.preventDefault();
    console.log('lol');
    $('body').toggleClass('navigation-visible');
  });
};

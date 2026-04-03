$(document).ready(() => {
  $('.flip-card').on('touchend', function (e) {
    e.preventDefault();
    $(this).toggleClass('tapped');
  });
});

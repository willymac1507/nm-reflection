$(document).ready(() => {
    $('.carousel__main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        dots: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        pauseOnDotsHover: true,
    });
  const cookieConsent = sessionStorage.getItem('cookies');
  console.log(cookieConsent);
  if (!cookieConsent) {
    $('#cookies').addClass('show');
    $('body').css({height: '100vh', overflow: 'hidden'});
  }
});

$('#supportButton').click(() => {
  sessionStorage.removeItem('cookies');
});

$('.button--cookieAccept').click(() => {
  sessionStorage.setItem('cookies', true);
  $('#cookies').removeClass('show');
  $('body').removeAttr("style");
});

$(function () {
  $("header").clone().insertBefore('header').addClass("header--hidden");
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
    $('body').css({
      height: '100vh',
      overflow: 'hidden'
    });
  };
});

let pagePosition = 0;

$('#supportButton').click(() => {
  sessionStorage.removeItem('cookies');
});

$('.button--cookieAccept').click(() => {
  sessionStorage.setItem('cookies', true);
  $('#cookies').removeClass('show');
  $('body').removeAttr("style");
});

$(document).on('scroll', () => {

  const headHeight = $('header').height();
  let scrollValue = $(document).scrollTop();

  if (scrollValue < pagePosition)
  // User is scrolling up
  {
    if (scrollValue > headHeight) {
      console.log('hidden');
      $('.header--hidden').addClass('header--animated').addClass('header--sticky');
    } else if (scrollValue === 0) {
      console.log('top');
      $('.header--hidden').removeClass('header--sticky');
    } else {
      console.log('visible');
      $('.header--hidden').removeClass('header--animated');
    }
  } else if (scrollValue > pagePosition)
  // User is scrolling down
  {
    $('.header--hidden').removeClass('header--sticky');
  } else {
    console.log('top');
  };
  pagePosition = scrollValue;
});
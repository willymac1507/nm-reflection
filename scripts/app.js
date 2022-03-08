$(function () {
  // Create clone of header and hide above body
  const headHeight = $('header').height();
  $("header").clone().insertBefore('header').addClass("header--hidden");

  // Instantiate slick carousel plugin
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

  // Check if cookie consent has been given in this session
  const cookieConsent = sessionStorage.getItem('cookies');
  if (!cookieConsent) {
    $('#cookies').addClass('show');
    $('body').css({
      height: '100vh',
      overflow: 'hidden'
    });
  };
});

function addClick(button) {
  button.on('click', () => {
    console.log('clicked');
  });
};

let pagePosition = 0;

// Handle scroll event to determine whether to show sticky navbar
$(document).on('scroll', () => {

  let scrollValue = $(document).scrollTop();
  const headHeight = $('header').height();

  if (scrollValue < pagePosition)
  // User is scrolling up
  {
    if (scrollValue > headHeight) {
      $('.header--hidden').addClass('header--animated').addClass('header--sticky');
    } else if (scrollValue === 0) {
      $('.header--hidden').removeClass('header--sticky');
    } else {
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

// Open or close sidebar
$('.page__container').on('click', (elem) => {
  console.log(elem.target);
  let clicked = elem.target;
  if (clicked.classList.contains('button--ham')) {
    console.log('true');
    $('.page__container').addClass('sidebar__shown');
  } else if (clicked.classList.contains('sidebar__overlay')) { 
    $('.page__container').removeClass('sidebar__shown');
  } else {
    console.log('false');
  };
});

// Accept cookies
$('.button--cookieAccept').on('click', () => {
  sessionStorage.setItem('cookies', 'true');
  $('#cookies').removeClass('show');
  $('body').removeAttr('style');
})
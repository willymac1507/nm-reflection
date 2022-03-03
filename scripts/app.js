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

// Handle scroll event to determine whether to show sticky navbar
$(document).on('scroll', () => {

  let scrollValue = $(document).scrollTop();
  const headHeight = $('header').height();

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
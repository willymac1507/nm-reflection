$(function () {
    // Create clone of header and hide above body
    // const headHeight = $('header').height();
    $("header").clone().insertBefore('header').addClass("header--hidden").removeClass('header--fixed').css('width', `${headerWidth()}px`);

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
    }
});

// Form text input validate
function textValidate(field) {
    const text = $('#' + field);
    const textContents = text.val();
    if (textContents.length === 0) {
        $(text).addClass('input--invalid');
        return false;
    } else {
        $(text).removeClass('input--invalid');
        return true;
    }
}

// Form telephone number validate
function telValidate(field) {
    const tel = $('#' + field);
    const telContents = tel.val();
    if (telContents.length === 0 || isNaN(telContents)) {
        $(tel).addClass('input--invalid');
        return false;
    } else {
        $(tel).removeClass('input--invalid');
        return true;
    }
}

// Form email validate
function emailValidate(field) {
    const email = $('#' + field);
    const emailContents = email.val();
    const pattern = new RegExp(
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}])|(([a-zA-Z\-\d]+\.)+[a-zA-Z]{2,}))$/
    );
    if (emailContents.length === 0) {
        $(email).addClass("input--invalid");
        return false;
    } else if (pattern.test(emailContents)) {
        $(email).removeClass("input--invalid");
        return true;
    } else {
        $(email).addClass("input--invalid");
        return true;
    }
}

//Contact form validation
function formValidate() {
    let getRequiredLabels = $(".contact-form__label.required");
    let requiredLabels = Object.values(getRequiredLabels);
    let formValid = false;
    requiredLabels.forEach((e) => {
        let field = e.nextElementSibling;
        if (field) {
            let inputName = field.id;
            if (inputName === 'contact-email') {
                formValid = emailValidate(inputName);
            } else if (inputName === 'contact-tel') {
                formValid = telValidate(inputName);
            } else {
                formValid = textValidate(inputName);
            }
        }
    })
    if (formValid) {
        $('.contact-form').submit();
    };
}

// Apply hover effect to button when mouse is over containing div
function hover(container, target) {
    $(container)
        .mouseenter((e) => {
            let but = $(e.currentTarget).children(target);
            but.toggleClass('hovered');
        })
        .mouseleave(() => {
            $(`${target}.hovered`).toggleClass('hovered');
        });
}

function sbWidth() {
    const side = ($('.sidebar__smallServices:visible').length === 1) ? document.querySelector('.sidebar__smallServices') : document.querySelector('.sidebar__bigServices');
    const body = document.body;
    const bodyRect = body.getBoundingClientRect();
    const sideRect = side.getBoundingClientRect();
    return (bodyRect.width - sideRect.left) * -1;
}

function headerWidth() {
    return $('.header--fixed').width();
}

let pagePosition = 0;

$('.button--enquiry').on('click', () => {
    $('.contact-form').submit();
});

// Handle scroll event to determine whether to show sticky navbar
$('.main__holder').on('scroll', (e) => {

    let scrollValue = $('.main__holder').scrollTop();
    const headHeight = $('header').height();
    // console.log(scrollValue, pagePosition);

    if (scrollValue < pagePosition) {
        if (scrollValue > headHeight) {
            $('.header--hidden').addClass('header--animated').addClass('header--sticky').css('width', `${headerWidth()}px`);
        } else if (scrollValue === 0) {
            $('.header--hidden').removeClass('header--sticky');
        } else {
            $('.header--hidden').removeClass('header--animated');
        }
        // User is scrolling down
    } else if (scrollValue > pagePosition) {
        $('.header--hidden').removeClass('header--sticky');
    } else {
        // console.log('top');
    }
    pagePosition = scrollValue;
});

// Open or close sidebar
$('.page__container').on('click', (e) => {
    let clicked = e.target;

    if (clicked.classList.contains('button--ham')) {
        $('.sidebar__contents').show();
        $('.page__container').css('left', sbWidth).addClass('sidebar__shown');
        $('.header--hidden').css('left', sbWidth);
        // $('body').css('top', -(document.documentElement.scrollTop) + 'px').addClass('noScroll');
        $('.hamburger').addClass('hamburger--open');

    } else if (clicked.classList.contains('sidebar__overlay')) {
        $('.page__container').removeClass('sidebar__shown').removeAttr('style');
        // $('body').removeAttr('style').removeClass('noScroll');
        $('.sidebar__container').scrollTop(0);
        $('.header--hidden').removeAttr('style').css('width', `${headerWidth()}px`);
        $('.hamburger').removeClass('hamburger--open');
        $('.sidebar__contents').delay(200).fadeOut('fast');

    } else {
        // return false;
    }
});

// Accept cookies
$('.button--cookieAccept').on('click', () => {
    sessionStorage.setItem('cookies', 'true');
    $('#cookies').removeClass('show');
    $('body').removeAttr('style');
})

hover('.sideService__container', '.button');
hover('.sidebar__group', '.sideGroup__heading');

function noScroll() {
    let scrollTop = parseInt($('html').css('top'));
    $('html').removeClass('noscroll');
    $('html,body').scrollTop(-scrollTop);
}

// Show OOH support
$('.ooh-support').on('click', () => {
    $('.contact-support__container').slideToggle();
})
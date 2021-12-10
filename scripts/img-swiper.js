var swiper = new Swiper(".plants-slider", {
    loop: true,
    centereslides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,

        },
        768: {
            slidesPerView: 2,

        },
        1024: {
            slidesPerView: 3,

        },
    },
});

let loginform = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () => {
    loginform.classList.toggle('active');
}
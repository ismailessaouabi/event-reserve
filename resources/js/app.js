import './bootstrap';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.mySwiper', {
        modules: [Navigation, Pagination, Autoplay], // ← Ajoutez cette ligne
        loop: true,
        slidesPerView: 3,
        spaceBetween: 10,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
});
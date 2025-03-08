import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const marqueeContent = document.querySelector('.marquee-content');

window.addEventListener('load', () => {
    marqueeContent.style.opacity = '1';
});

marqueeContent.addEventListener('animationiteration', () => {
    marqueeContent.style.animation = 'none';
    setTimeout(() => {
        marqueeContent.style.animation = '';
    }, 50);
});

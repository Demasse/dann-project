import './bootstrap';
import Alpine, { data } from 'alpinejs';

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

// const app = new Vue({
//     el: '#app',
//     router,
//     data:{
//         seacrch: ''
//     },
//     methods:{
//         searchit: _.debounce(() => {
//             Fire.$emit('searching');
//         }, 1000),

//         printme() {
//             window.print();
//         }
//     }

// });

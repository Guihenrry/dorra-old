import SimpleSlide from './modules/SimpleSlide.js';
import Slide from './modules/slide.js';
import Gallery from './modules/Gallery.js';
import Modal from './modules/Modal.js';

const banner = new SimpleSlide({
  slide: 'banner',
  nav: true,
});

const vantagem = new SimpleSlide({
  slide: 'vantagem',
});

const quote = new SimpleSlide({
  slide: 'quote',
});

const slide = new Slide('.slide', '.slide-wrapper');
slide.init();

const gallery = new Gallery('[data-gallery="main"]', '[data-gallery="list"]');
gallery.init();

const modalMedidas = new Modal('[data-modal="open"]', '[data-modal="close"]', '[data-modal="container"]');
modalMedidas.init();

import SimpleSlide from './modules/SimpleSlide.js';
import Slide from './modules/slide.js';

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

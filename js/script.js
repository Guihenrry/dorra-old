import SimpleSlide from './modules/SimpleSlide.js';
import Slide from './modules/slide.js';
import Gallery from './modules/Gallery.js';
import Modal from './modules/Modal.js';
import SimpleForm from './modules/SimpleForm.js';

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

const simpleForm = new SimpleForm({
  form: ".formphp", // seletor do formulário
  button: "#enviar", // seletor do botão
  erro: "<div id='form-erro'><p>Um erro ocorreu, tente para o email contato@bikcraft.com.</p></div>", // mensagem de erro
  sucesso: "<div id='form-send'><h2>Formulário enviado com sucesso</h2><p>Em breve eu entro em contato com você.</p></div>", // mensagem de sucesso
});

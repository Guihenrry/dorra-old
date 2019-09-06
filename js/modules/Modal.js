export default class Modal {
  constructor(btnOpen, btnClose, container) {
    this.btnOpen = document.querySelector(btnOpen);
    this.btnClose = document.querySelector(btnClose);
    this.container = document.querySelector(container);
    this.activeClass = 'active';

    // Bind
    this.toggleModal = this.toggleModal.bind(this);
    this.clickOut = this.clickOut.bind(this);
  }

  toggleModal(event) {
    event.preventDefault();
    this.container.classList.toggle(this.activeClass);
  }

  clickOut({target}) {
    if (target === this.container) 
      this.toggleModal(event);
  }

  addModalEvents() {
    this.btnOpen.addEventListener('click', this.toggleModal);
    this.btnClose.addEventListener('click', this.toggleModal);
    this.container.addEventListener('click', this.clickOut)
  }

  init() {
    if (this.btnOpen && this.btnClose && this.container) {
      this.addModalEvents();
    }

    return this;
  }
}

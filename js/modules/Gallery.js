export default class Gallery {
  constructor(galleryMain, galleryList) {
    this.galleryMain = document.querySelector(galleryMain);
    this.galleryList = document.querySelectorAll(galleryList);
    this.activeClass = 'active';

    // Bind
    this.changeImage = this.changeImage.bind(this);
    this.changeImageSrcMain = this.changeImageSrcMain.bind(this);
    this.changeImageHover = this.changeImageHover.bind(this);
  }

  addActiveClass() {
    this.galleryList.forEach((img) => {
      img.src === this.srcMain ? img.classList.add(this.activeClass) : img.classList.remove(this.activeClass);
    });
  }

  changeImageSrcMain() {
    this.galleryMain.src = this.srcMain;
  }

  changeImage({ currentTarget }) {
    this.galleryMain.src = currentTarget.src;
    this.srcMain = currentTarget.src;
    this.addActiveClass();
  }

  changeImageHover({ currentTarget }) {
    this.galleryMain.src = currentTarget.src;
  }

  addEventsGallery() {
    this.galleryList.forEach((img) => {
      img.addEventListener('click', this.changeImage);
      img.addEventListener('mouseover', this.changeImageHover);
      img.addEventListener('mouseout', this.changeImageSrcMain);
    });
  }

  init() {
    if (this.galleryMain && this.galleryList.length) {
      this.addActiveClass();
      this.addEventsGallery();
      this.srcMain = this.galleryMain.src;
    }
    return this;
  }
}

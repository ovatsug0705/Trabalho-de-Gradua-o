class FontSize {
  constructor(elm, elm2){
    this.elm = elm;
    this.elm2 = elm2;
    this.root = document.getElementsByTagName('html')[0];
    this.setupListener();
  }

  setupListener(){
    this.elm.addEventListener('click', ()=> this.addBodyClass());
    this.elm2.addEventListener('click', ()=> this.removeBodyClass());
  }

  addBodyClass(){
    this.root.classList.contains('increased-font') ? this.root.classList.add('increased-font-2') :
    this.root.classList.add('increased-font');
  }

  removeBodyClass(){
    this.root.classList.contains('increased-font-2') ? this.root.classList.remove('increased-font-2') :
    this.root.classList.remove('increased-font');
  }
}

export default {
  create(elm, elm2) {
      let element = document.querySelector(elm);
      let element2 = document.querySelector(elm2);

      new FontSize(element, element2);
  }
}
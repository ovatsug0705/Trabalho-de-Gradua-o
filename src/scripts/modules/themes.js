class Themes {
  constructor(elm, elm2){
    this.elm = elm;
    this.elm2 = elm2;
    this.themes = [];
    this.setupListener();
  }

  setupListener(){
    this.elm.addEventListener('click', ()=> this.elm2.classList.toggle("active"));
    this.themes = Array.from(this.elm2.querySelectorAll('[data-themes-color]'));
    console.log('oi', this.themes);
  }
}

export default {
  create(elm, elm2) {
      let element = document.querySelector(elm);
      let element2 = document.querySelector(elm2);

      new Themes(element, element2);
  }
}
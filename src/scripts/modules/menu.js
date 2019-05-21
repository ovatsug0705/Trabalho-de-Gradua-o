class Menu {
  constructor(elm, elm2){
    this.elm = elm;
    this.elm2 = elm2;
    this.setupListener();
  }

  setupListener(){
    this.elm.addEventListener('click', ()=>{
      this.elm2.classList.toggle('active');
      // document.querySelector('header').classList.toggle('opacity');
      // document.querySelector('footer').classList.toggle('opacity');
    });
  }
}

export default {
  create(elm, elm2) {
      let element = document.querySelector(elm);
      let element2 = document.querySelector(elm2);

      new Menu(element, element2);
  }
}
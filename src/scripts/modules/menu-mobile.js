
class MenuMobile {
  constructor(){
    this.elm = document.querySelector('[data-menu]');
    this.elm2 = document.querySelector('[data-menu-button]');
    this.elm3 = document.body;
    if(window.innerWidth <= 1169) this.setupListeners();
  }

  setupListeners(){
    this.elm.addEventListener('click', (evt)=> evt.stopPropagation());
    this.elm2.addEventListener('click', (evt)=> this.toggleMenu(evt));
    this.elm3.addEventListener('click', (evt)=> this.closeMenu(evt))
  }

  toggleMenu(evt){
    if(evt.currentTarget == this.elm2) evt.stopPropagation();
    this.elm.classList.toggle('active');
    this.elm2.classList.toggle('active');
    this.elm3.classList.toggle('hide');
  }

  closeMenu(){
    this.elm.classList.remove('active');
    this.elm2.classList.remove('active');
    this.elm3.classList.remove('hide');
  }
}

export default {
  create() {
    new MenuMobile();
  }
}
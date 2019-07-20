class SearchMobile {
  constructor(){
    this.elm = document.querySelector('[data-search-submit]');
    this.elm2 = document.querySelector('[data-search-input]');
    this.elm3 = document.querySelector('[data-search-mobile]');
    this.elm4 = document.querySelector('[data-search-close]');
    if(window.innerWidth <= 767) this.setupListeners();
  }
  
  setupListeners(){
    this.elm.addEventListener('click', (evt)=> this.openInput(evt));
    this.elm4.addEventListener('click', (evt)=> this.closeInput(evt));
  }
  
  openInput(evt){
    evt.preventDefault();
    this.elm2.classList.add('active');
    this.elm4.classList.add('active');
    this.elm3.classList.add('show');
    this.elm.parentNode.replaceChild(this.elm.cloneNode(true), this.elm);
    this.elm = document.querySelector('[data-search-submit]'); 
  }
  
  closeInput(evt){
    evt.preventDefault();
    this.elm2.classList.remove('active');
    this.elm4.classList.remove('active');
    this.elm3.classList.remove('show');
    this.setupListeners();
  }
}

export default {
  create() {
    new SearchMobile();
  }
}
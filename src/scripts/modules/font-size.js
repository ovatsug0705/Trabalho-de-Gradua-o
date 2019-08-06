function FontSize() {
  const elm = document.querySelector('[data-font-increase]');
  const elm2 = document.querySelector('[data-font-decrease]');
  const root = document.getElementsByTagName('html')[0];

  function setupListeners(){
    elm.addEventListener('click', addBodyClass);
    elm2.addEventListener('click', removeBodyClass);
  }

  function addBodyClass() {
    root.classList.contains('increased-font') ? root.classList.add('increased-font-2') :
    root.classList.add('increased-font');
  }

  function removeBodyClass(){
    root.classList.contains('increased-font-2') ? root.classList.remove('increased-font-2') :
    root.classList.remove('increased-font');
  }

  function init() {
    setupListeners();
  }

  init();
}

// class FontSize {
//   constructor(){
//     this.elm = document.querySelector('[data-font-increase]');
//     this.elm2 = document.querySelector('[data-font-decrease]');
//     this.root = document.getElementsByTagName('html')[0];
//     this.setupListeners();
//   }

//   setupListeners(){
//     this.elm.addEventListener('click', ()=> this.addBodyClass());
//     this.elm2.addEventListener('click', ()=> this.removeBodyClass());
//   }

//   addBodyClass(){
//     this.root.classList.contains('increased-font') ? this.root.classList.add('increased-font-2') :
//     this.root.classList.add('increased-font');
//   }

//   removeBodyClass(){
//     this.root.classList.contains('increased-font-2') ? this.root.classList.remove('increased-font-2') :
//     this.root.classList.remove('increased-font');
//   }
// }

export default {
  create: FontSize,
}
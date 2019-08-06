function SearchMobile() {
  const elm = document.querySelector('[data-search-submit]');
  const elm2 = document.querySelector('[data-search-input]');
  const elm3 = document.querySelector('[data-search-mobile]');
  const elm4 = document.querySelector('[data-search-close]');
  
  function setupListeners(){
    elm.addEventListener('click', openInput);
    elm4.addEventListener('click', closeInput);
  }
  
  function openInput(evt){
    evt.preventDefault();
    elm2.classList.add('active');
    elm4.classList.add('active');
    elm3.classList.add('show');
    elm.removeEventListener('click', openInput);
  }
  
  function closeInput(evt){
    evt.preventDefault();
    elm2.classList.remove('active');
    elm4.classList.remove('active');
    elm3.classList.remove('show');
    setupListeners();
  }

  function init(){
    setupListeners();
  }

  if(window.innerWidth <= 767) init();
}

export default {
  create: SearchMobile,
}
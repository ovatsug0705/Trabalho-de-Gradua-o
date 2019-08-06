function Search() {
  const elm = document.querySelector('[data-search-input]');
  const elm2 = document.querySelector('[data-search-close]');

  function setupListeners(){
    elm.addEventListener('keydown', displayCloseButton);
    elm2.addEventListener('click', clearInput);
  }

  function displayCloseButton(evt){
    setTimeout(()=>{
      elm.value == '' ? elm2.classList.add('hide') : elm2.classList.remove('hide');
    }, 200);
  } 

  function clearInput(evt){
    elm.value = null;
    elm2.classList.add('hide');
  }

  function init(){
    setupListeners();
  }

  init();
}

export default {
  create: Search,
}
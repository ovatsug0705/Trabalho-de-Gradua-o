function FontSize() {
  const elm = document.querySelector('[data-font-increase]');
  const elm2 = document.querySelector('[data-font-decrease]');
  const root = document.getElementsByTagName('html')[0];

  function setupListeners(){
    elm.addEventListener('click', addBodyClass);
    elm2.addEventListener('click', removeBodyClass);
  }

  function addBodyClass() {
    if(root.classList.contains('increased-font')) {
      root.classList.add('increased-font-2');
      localStorage.setItem('increased-font', '2')
    } else {
      root.classList.add('increased-font');
      localStorage.setItem('increased-font', '1')
    }
    
  }

  function removeBodyClass(){
    if(root.classList.contains('increased-font-2')) {
      root.classList.remove('increased-font-2');
      localStorage.setItem('increased-font', '1');
    } else {
      root.classList.remove('increased-font');
      localStorage.setItem('increased-font', '0');
    }
  }

  function checkLocalStorage() {
    console.log('test', localStorage.getItem('increased-font'));
    if(localStorage.getItem('increased-font') === '2') {
      root.classList.add('increased-font');
      root.classList.add('increased-font-2');
    } else if(localStorage.getItem('increased-font') === '1') {
      root.classList.add('increased-font');
    }
  }

  function init() {
    setupListeners();
    checkLocalStorage();
  }

  init();
}

export default {
  create: FontSize,
}
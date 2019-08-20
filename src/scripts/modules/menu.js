
function Menu() {
  const elm = document.querySelector('[data-menu]');
  const elm2 = document.body;
  const buttons = document.querySelectorAll('[data-menu-button]');

  function setupListeners(){
    elm.addEventListener('click', (evt)=> evt.stopPropagation());
    Array.from(buttons).forEach(btn => btn.addEventListener('click', toggleMenu));
    elm2.addEventListener('click', closeMenu);
  }

  function toggleMenu(evt){
    buttons.forEach(btn => evt.currentTarget == btn ? evt.stopPropagation() : null);
    elm.classList.toggle('active');
    elm2.classList.toggle('hide');
  }

  function closeMenu(){
    elm.classList.remove('active');
    elm2.classList.remove('hide');
  }

  function init(){
    setupListeners();
  }
  
  init();
}

export default {
  create: Menu,
}
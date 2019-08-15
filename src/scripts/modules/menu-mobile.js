
function MenuMobile() {
  const elm = document.querySelector('[data-menu]');
  const elm2 = document.querySelector('[data-menu-button]');
  const elm3 = document.body;

  function setupListeners(){
    elm.addEventListener('click', (evt)=> evt.stopPropagation());
    elm2.addEventListener('click', toggleMenu);
    elm3.addEventListener('click', closeMenu);
  }

  function toggleMenu(evt){
    if(evt.currentTarget == elm2) evt.stopPropagation();
    elm.classList.toggle('active');
    elm2.classList.toggle('active');
    elm3.classList.toggle('hide');
  }

  function closeMenu(){
    elm.classList.remove('active');
    elm2.classList.remove('active');
    elm3.classList.remove('hide');
  }

  function init(){
    setupListeners();
  }

  // if(window.innerWidth <= 1169) init();
  init();
}

export default {
  create: MenuMobile,
}
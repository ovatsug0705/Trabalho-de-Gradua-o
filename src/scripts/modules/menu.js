
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
    buttons.forEach(btn => {
      if(evt.currentTarget == btn) {
        evt.stopPropagation();
        btn.classList.toggle('active');
      }
    });
    elm.classList.toggle('active');
    elm2.classList.toggle('hide');
  }

  function closeMenu(){
    elm.classList.remove('active');
    elm2.classList.remove('hide');
    buttons.forEach(btn => btn.classList.remove('active'));
  }

  function init(){
    setupListeners();
  }
  
  init();
}

export default {
  create: Menu,
}
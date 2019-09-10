function MobileActions(){
  const gear = document.querySelector('[data-show-actions]') || false;
  const actions = document.querySelector('[data-actions]') || false;

  function setupListeners(){
    gear.addEventListener('click', ()=> actions.classList.toggle('active'));
  }

  function init(){
    setupListeners();
  }

  if(window.innerWidth <= 1169 && actions && gear) init();
}

export default {
  create: MobileActions
}
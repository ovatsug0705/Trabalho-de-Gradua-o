function BottomButtons(){
  const bottons = document.querySelectorAll('[data-bottom-btn]') || false;
  let elms = null;

  function setupListeners(){
    elms = Array.from(bottons);
    elms.forEach(btn => {
      if(window.innerHeight == document.body.clientHeight) btn.classList.add('bottom');
    });
    window.addEventListener('scroll', toggleClass)
  }

  function toggleClass(evt){
    if((window.innerHeight + window.scrollY ) >= document.body.clientHeight - 50) {
      elms.forEach(btn => btn.classList.add('bottom'));
    } else {
      elms.forEach(btn => btn.classList.remove('bottom'));
    }
  }

  function init(){
    setupListeners();
  }

  if(window.innerWidth <= 767 && bottons) init();
}

export default {
  create: BottomButtons,
}
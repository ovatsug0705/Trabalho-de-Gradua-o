function Acordeon(){
  const acordeons = document.querySelectorAll('[data-acordeon]') || false;

  function setupListener(){
    Array.from(acordeons).forEach((elm) => elm.addEventListener('click', toggleAcordeon));
  }

  function toggleAcordeon(evt){
    let accordeonTarget = Array.from(acordeons).filter((elm) => {
      return elm == evt.currentTarget ? elm : false;
    });
    
    accordeonTarget[0].classList.toggle('active');
  }

  function init(){
   setupListener();
  }

  if (acordeons) init();
}

export default {
  create: Acordeon,
}
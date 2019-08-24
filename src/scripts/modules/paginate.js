function Paginate(){
  const paginate = document.querySelector('[data-paginate]') || false;

  function setupListeners(){
    if(window.innerHeight == document.body.clientHeight) paginate.classList.add('bottom');
    window.addEventListener('scroll', toggleClass)
  }

  function toggleClass(evt){
    if((window.innerHeight + window.scrollY ) >= document.body.clientHeight - 50) {
      paginate.classList.add('bottom');
    } else {
      paginate.classList.remove('bottom');
    }
  }

  function init(){
    setupListeners();
  }

  if(window.innerWidth <= 767 && paginate) init();
}

export default {
  create: Paginate,
}
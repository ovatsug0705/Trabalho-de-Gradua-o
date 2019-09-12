function Themes() {
  const elm = document.querySelector('[data-themes-button]');
  const elm2 = document.querySelector('[data-themes]');
  const root = document.getElementsByTagName('html')[0];
  let themes = [];
  
  function setupListeners(){
    elm.addEventListener('click', ()=> {
      elm2.classList.toggle('active');
      if(window.innerWidth <= 768) document.body.classList.toggle('hide2');
    });
    themes = Array.from(elm2.querySelectorAll('[data-themes-color]'));
    themes.forEach(item => {
      item.addEventListener('click', changeTheme);
    });
  }
  
  function changeTheme(evt){
    let data = evt ? evt.currentTarget.dataset.themesColor : null;
    
    themes.forEach(item => {
      item.classList.remove('active');
    });
    
    setTimeout(()=> {
      elm2.classList.remove('active');
      document.body.classList.remove('hide2');
    }, 150);
    
    switch (data) {
      case '0':
        root.classList.remove('t-theme-01');
        root.classList.remove('t-theme-02');
        root.classList.remove('t-theme-03');
        break;
      case '1':
        root.classList.add('t-theme-01');
        root.classList.remove('t-theme-02');
        root.classList.remove('t-theme-03');
        break;
      case '2':
        root.classList.add('t-theme-02');
        root.classList.remove('t-theme-01');
        root.classList.remove('t-theme-03');
        break;
      case '3':
        root.classList.add('t-theme-03');
        root.classList.remove('t-theme-02');
        root.classList.remove('t-theme-01');
        break;
      default:
        if (localStorage.getItem('theme')) root.classList.add(localStorage.getItem('theme'));
      break;
    }
    
    setActiveTheme(data);
  }
  
  function setActiveTheme(data) {
    if (data) {
      localStorage.setItem('theme', `t-theme-0${data}`);
      themes[data].classList.add('active');
    } else if (localStorage.getItem('theme')) {
      themes[localStorage.getItem('theme').substr(9, 1)].classList.add('active');
    } else {
      themes[0].classList.add('active');
    }
  }

  function init(){
    setupListeners();
    changeTheme();
  }
  
  init();
}

export default {
  create: Themes,
}
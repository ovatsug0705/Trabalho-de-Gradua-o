class Themes {
  constructor(){
    this.elm = document.querySelector('[data-themes-button]');
    this.elm2 = document.querySelector('[data-themes]');
    this.themes = [];
    this.setupListeners();
    this.changeTheme();
  }
  
  setupListeners(){
    this.elm.addEventListener('click', ()=> this.elm2.classList.toggle('active'));
    this.themes = Array.from(this.elm2.querySelectorAll('[data-themes-color]'));
    this.themes.forEach(item => {
      item.addEventListener('click', ()=> this.changeTheme());
    });
  }
  
  changeTheme(){
    let data = event ? event.currentTarget.dataset.themesColor : null;
    
    this.themes.forEach(item => {
      item.classList.remove('active');
    });
    
    setTimeout(()=> this.elm2.classList.remove('active'), 150);
    
    switch (data) {
      case '0':
      document.body.classList.remove('t-theme-01');
      document.body.classList.remove('t-theme-02');
      document.body.classList.remove('t-theme-03');
      break;
      case '1':
      document.body.classList.add('t-theme-01');
      document.body.classList.remove('t-theme-02');
      document.body.classList.remove('t-theme-03');
      break;
      case '2':
      document.body.classList.add('t-theme-02');
      document.body.classList.remove('t-theme-01');
      document.body.classList.remove('t-theme-03');
      break;
      case '3':
      document.body.classList.add('t-theme-03');
      document.body.classList.remove('t-theme-02');
      document.body.classList.remove('t-theme-01');
      break;
      default:
      if (localStorage.getItem('theme')) document.body.classList.add(localStorage.getItem('theme'));
      break;
    }
    
    this.setActiveTheme(data);
  }
  
  setActiveTheme(data) {
    if (data) {
      localStorage.setItem('theme', `t-theme-0${data}`);
      this.themes[data].classList.add('active');
    } else if (localStorage.getItem('theme')) {
      this.themes[localStorage.getItem('theme').substr(9, 1)].classList.add('active');
    } else {
      this.themes[0].classList.add('active');
    }
  }
}

export default {
  create() {
    new Themes();
  }
}
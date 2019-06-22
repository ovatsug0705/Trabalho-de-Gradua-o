const $ = require ('jquery');

class Test {
  constructor(elm, elm2, elm3){
    this.elm = elm;
    this.elm2 = elm2;
    this.elm3 = elm3;
    this.setupListener();
  }

  setupListener(){
    this.elm2.addEventListener('click', (evt)=> {
      evt.preventDefault();
      let test = this.elm3.value
      $.ajax({
        url: 'http://tg.working:81/busca',
        method: 'GET',
        data: {
          s: test,
        },
        success: function(data) {
          $('body').html(data);
        }
      });
    });

    $(link).click((evt)=>{
      evt.preventDefault();
      $.ajax({
        url: $(link).attr('href'),
        method: 'GET',
        success: function(data) {
          $('body').html(data);
          window.history.pushState("Catecismo", "Title", $(link).attr('href'));
        }
      });
    })
  }
}

export default {
  create(elm, elm2, elm3) {
    let element = document.querySelector(elm);
    let element2 = document.querySelector(elm2);
    let element3 = document.querySelector(elm3);

    new Test(element, element2, element3);
  }
}
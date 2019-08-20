
/*
const $ = require ('jquery');

class Test {
  constructor(){
    this.setupListener();
  }

  setupListener(){
      document.getElementById('livro').addEventListener('change', (evt)=> {
      evt.preventDefault();
      $.ajax({
        url: 'http://tg.working:10080/biblia',
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
  create() {
    new Test();
  }
}
*/
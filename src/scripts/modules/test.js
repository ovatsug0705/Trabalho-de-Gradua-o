class Teste {
    constructor(elm){
        this.elm = elm;
        this.setupListener();
    }

    setupListener(){
        this.elm.addEventListener('click', ()=>console.log('oi'));
    }
}

export default {
    create(elm) {
        let element = document.querySelector(elm);
        new Teste(element);
    }
}
class noticiaView {
  constructor(controller, model) {
    /*FORM*/
    this.titulo = document.querySelector('#titulo_noticia');
    this.desc = document.querySelector('#desc_noticia');
    // this.img = document.querySelector('#img_noticia').value;
    /***modal***/
    this.list = document.querySelector('#myModal3');
    /***Controller e Model***/
    this.controller = controller;
    this.model = model;
    /****button criar****/
    this.button = document.querySelector('#vizualizar-noticia');
    this.button.onclick = this.createNoticia.bind(this);
  }
  createNoticia(){
    try {
      if(!this.titulo.value) throw 'Preencha o titulo';
      if(!this.desc.value) throw 'Preencha a Descrição';
      // if (!this.img) throw 'Coloque uma imagem, é obrigatório';
      this.controller.createNoticiaController(this.titulo.value, this.desc.value);
      this.NewNoticia();

    } catch (err) {
      alert('O ERRO FOI:'+err);
    }
    this.exibe();
  }
  exibe(){
    $('#vizualizar-noticia').click(function() {
    	$('#myModal3').toggle("fast");
    });
    $('#close-vizualizador').click(function() {
    	$('#myModal3').hide("fast");
    });

  }
  NewNoticia(){
    let titulo = document.querySelector("#titulo-noticias").innerHTML = this.titulo.value;
    let desc = document.querySelector("#desc-noticia").innerHTML = this.desc.value;

    }
}//fim-class

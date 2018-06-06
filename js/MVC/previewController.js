class noticiaController {
  constructor(model) {
    this.model = model;
  }
  createNoticiaController(titulo, desc_noticia){
    let noticia = new Noticia(titulo, desc_noticia);
    this.model.create(noticia);
  }
}

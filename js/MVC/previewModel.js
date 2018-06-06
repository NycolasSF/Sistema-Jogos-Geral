class noticiaModel {
  constructor() {
    this.name = 'noticia';
    this.banco = [];
  }
  create(noticia){
		this.banco.push(noticia);
		return this;
	}
}

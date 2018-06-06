class Noticia {
  constructor(titulo, desc, img) {
    this.titulo = titulo;
    this.desc = desc;
    this.img = img;
  }
  mostrarTitulo(){
    return this.titulo;
  }
  mostrarInfo(){
    return this.desc;
  }
  mostrarImg(){
    return this.img;
  }
}

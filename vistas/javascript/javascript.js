
class RequerimientoGet {


  constructor() {
    this.url="";
    this.requerimiento = new XMLHttpRequest();
    this.parametros="";
    this.numero=0;
  }

    addParametro(nombre,valor)
    {
    if(this.numero == 0)
      {
      this.parametros+="?"+nombre+"="+valor;
      }
    else
      {
      this.parametros+="&"+nombre+"="+valor;
      }
    this.numero++;
    }

    addListener(listener)
    {
    this.requerimiento.addEventListener('load',listener,false);
    }

    setURL(url)
    {
    this.url = url;
    }

    ejecutar()
    {
    this.url+=this.parametros;
    this.requerimiento.open('GET',this.url,true);
    this.requerimiento.send();
    }

    clear()
    {
      this.url="";
      this.requerimiento = new XMLHttpRequest();
      this.parametros="";
      this.numero=0;
    }


}

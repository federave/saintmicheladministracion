
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



function crearXML(dato)
{

  if (window.DOMParser)
    {
    parser = new DOMParser();
    xmlDoc = parser.parseFromString(dato, "text/xml");
    }
  else // Internet Explorer
    {
    xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
    xmlDoc.async = false;
    xmlDoc.loadXML(dato);
    }

    return xmlDoc;
}







class XML {


  constructor() {

    this.xml="";



  }


    startTag(nombreTag)
    {
    this.xml += "<" + nombreTag + ">";
    }

    closeTag(nombreTag)
    {
    this.xml +="</" + nombreTag + ">";
    }

    addValue(valor)
    {
    this.xml += valor;
    }

    addTag(nombreTag,valor)
    {
    this.startTag(nombreTag);
    this.addValue(valor);
    this.closeTag(nombreTag);
    }

    getXML(){return this.xml;}

    toString(){return this.xml;}



}

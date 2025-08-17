//Ejercicio 1
class CabezeraPagina{
    private titulo:string;
    private color:string;
    private fuente:string;
    private alineacion:string;

    //Constructor
    constructor(tituloPm:string,colorPm:string,
        fuentePm:string){ //Pm: Parametro
            this.titulo=tituloPm;
            this.color=colorPm;
            this.fuente=fuentePm;
        }

        //Metodos
        getPropiedades():CabezeraPagina{
            return this
        }
        setAlineacion(tipoAlineacion:string){
            this.alineacion=tipoAlineacion;
        }
        imprimirPropiedades(){
            console.log('Titulo ',this.titulo);
            console.log('Color ',this.color);
            console.log('Fuente ',this.fuente);
            console.log('alineacion ',this.alineacion);
        }
}
    //Caso de Uso
    let paginaBanco:CabezeraPagina = new CabezeraPagina("Banco Terobo","Negro","ComicSans")
    console.log(paginaBanco.getPropiedades());
    paginaBanco.setAlineacion("Centrado");
    paginaBanco.imprimirPropiedades();

//Ejercicio 2

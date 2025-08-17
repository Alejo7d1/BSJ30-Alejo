//Ejercicio 1
var CabezeraPagina = /** @class */ (function () {
    //Constructor
    function CabezeraPagina(tituloPm, colorPm, fuentePm) {
        this.titulo = tituloPm;
        this.color = colorPm;
        this.fuente = fuentePm;
    }
    //Metodos
    CabezeraPagina.prototype.getPropiedades = function () {
        return this;
    };
    CabezeraPagina.prototype.setAlineacion = function (tipoAlineacion) {
        this.alineacion = tipoAlineacion;
    };
    CabezeraPagina.prototype.imprimirPropiedades = function () {
        console.log('Titulo ', this.titulo);
        console.log('Color ', this.color);
        console.log('Fuente ', this.fuente);
        console.log('alineacion ', this.alineacion);
    };
    return CabezeraPagina;
}());
var paginaBanco = new CabezeraPagina("Banco Terobo", "Negro", "ComicSans");
console.log(paginaBanco.getPropiedades());
paginaBanco.setAlineacion("Centrado");
paginaBanco.imprimirPropiedades();

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
//Caso de Uso
var paginaBanco = new CabezeraPagina("Banco Terobo", "Negro", "ComicSans");
console.log(paginaBanco.getPropiedades());
paginaBanco.setAlineacion("Centrado");
paginaBanco.imprimirPropiedades();
//Ejercicio 2
var Calculadora = /** @class */ (function () {
    function Calculadora(valorAPm, valorBPm) {
        this.valorA = valorAPm;
        this.valorB = valorBPm;
    }
    Calculadora.prototype.sumar = function () {
        return (this.valorA + this.valorB);
    };
    Calculadora.prototype.restar = function () {
        return (this.valorA - this.valorB);
    };
    Calculadora.prototype.multiplicar = function () {
        return (this.valorA * this.valorB);
    };
    Calculadora.prototype.dividir = function () {
        if (this.valorB == 0)
            return NaN; //No se puede dividir entre 0
        return (this.valorA / this.valorB);
    };
    Calculadora.prototype.potencia = function () {
        return (Math.pow(this.valorA, this.valorB));
    };
    Calculadora.prototype.factorial = function () {
        if (this.valorA < 0)
            return NaN; //No existe factorial de negativos
        if (this.valorA === 0 || this.valorA === 1)
            return 1; //Caso 0 y 1 es 1
        var resultado = 1;
        for (var i = 2; i <= this.valorA; i++) {
            resultado *= i;
        }
        return resultado;
    };
    return Calculadora;
}());
//Caso de uso
var calc = new Calculadora(7, 5);
console.log(calc.sumar());
console.log(calc.restar());
console.log(calc.multiplicar());
console.log(calc.dividir());
console.log(calc.potencia());
console.log(calc.factorial());
//Ejercicio 3
var Cancion = /** @class */ (function () {
    //Metodos
    function Cancion(titulo, genero) {
        this.titulo = titulo;
        this.genero = genero;
        this.autor = "";
    }
    Cancion.prototype.setAutor = function (autor) {
        this.autor = autor;
    };
    Cancion.prototype.getAutor = function () {
        return this.autor;
    };
    Cancion.prototype.mostrarDatos = function () {
        console.log('Título ', this.titulo);
        console.log('Género: ', this.genero);
        console.log('Autor: ', this.autor);
    };
    return Cancion;
}());
//Caso de uso
var cancion1 = new Cancion("Desde el rio", "Rock");
cancion1.setAutor("Pato Rockero");
console.log(cancion1.getAutor());
cancion1.mostrarDatos();

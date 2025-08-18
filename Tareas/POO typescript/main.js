var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
console.log("Ejercicio 1");
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
console.log("");
console.log("Ejercicio 2");
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
console.log("");
console.log("Ejercicio 3");
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
console.log("");
console.log("Ejercicio 4");
//Ejercicio 4
var Cuenta = /** @class */ (function () {
    function Cuenta(nombrePm, cantidadPm, tipoCuentaPm, numeroCuentaPm) {
        this.nombre = nombrePm;
        this.cantidad = cantidadPm;
        this.tipoCuenta = tipoCuentaPm;
        this.numeroCuenta = numeroCuentaPm;
    }
    //Metodos
    Cuenta.prototype.depositar = function (cantidadIn) {
        if (cantidadIn < 5) {
            console.log("La cantidad debe ser mayor o igual a $5.00");
        }
        else {
            this.cantidad += cantidadIn;
            console.log("Deposito de ".concat(cantidadIn, " realizado correctamente"));
        }
    };
    Cuenta.prototype.retirar = function (valor) {
        if (valor < 5)
            console.log("Valor invalido");
        else if (valor > this.cantidad)
            console.log("Saldo insufiente para retiro");
        else {
            this.cantidad -= valor;
            console.log("Retiro de ".concat(valor, "$ realizado correctamente"));
            console.log("El nuevo saldo de cuenta es de: ".concat(this.cantidad, "$"));
        }
    };
    Cuenta.prototype.mostrarInfoCuenta = function () {
        console.log("Titular: ".concat(this.nombre));
        console.log("Tipo: ".concat(this.tipoCuenta));
        console.log("N\u00FAmero cuenta: ".concat(this.numeroCuenta));
    };
    return Cuenta;
}());
//Caso de uso
var cuentaAntonio = new Cuenta("Antonio Campo", 500, "Ahorro", "0567-4343-6060-1212");
cuentaAntonio.depositar(25);
cuentaAntonio.retirar(200);
cuentaAntonio.mostrarInfoCuenta();
console.log("");
console.log("Ejercicio 5");
//Ejercicio 5
var Persona = /** @class */ (function () {
    function Persona(nombrePm, apellidoPm, direccionPm, telefonoPm, edadPm) {
        this.nombre = nombrePm;
        this.apellido = apellidoPm;
        this.direccion = direccionPm;
        this.telefono = telefonoPm;
        this.edad = edadPm;
    }
    // Metodo de verificacion de edad
    Persona.prototype.esMayorDeEdad = function () {
        if (this.edad >= 18) {
            console.log("".concat(this.nombre, " es mayor de edad."));
        }
        else {
            console.log("".concat(this.nombre, " es menor de edad."));
        }
    };
    return Persona;
}());
var Empleado = /** @class */ (function (_super) {
    __extends(Empleado, _super);
    function Empleado(nombrePm, apellidoPm, direccionPm, telefonoPm, edadPm) {
        var _this = _super.call(this, nombrePm, apellidoPm, direccionPm, telefonoPm, edadPm) || this;
        _this.sueldo = 0;
        return _this;
    }
    Empleado.prototype.cargarSueldo = function (sueldo) {
        this.sueldo = sueldo;
    };
    Empleado.prototype.imprimirSueldo = function () {
        console.log("Sueldo: $".concat(this.sueldo));
    };
    // Implementación del metodo abstracto
    Empleado.prototype.mostrarDatos = function () {
        console.log("Nombre: ".concat(this.nombre));
        console.log("Apellido: ".concat(this.apellido));
        console.log("Direcci\u00F3n: ".concat(this.direccion));
        console.log("Tel\u00E9fono: ".concat(this.telefono));
        console.log("Edad: ".concat(this.edad));
    };
    return Empleado;
}(Persona));
// Caso de uso
var empleado1 = new Empleado("Paco", "Miralvalle", "Salvador de el mundo", "7070-5040", 35);
empleado1.cargarSueldo(1500);
empleado1.mostrarDatos();

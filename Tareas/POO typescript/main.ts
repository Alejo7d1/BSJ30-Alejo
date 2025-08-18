console.log("Ejercicio 1")
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

console.log("")
console.log("Ejercicio 2")


//Ejercicio 2
class Calculadora{
    private valorA:number;
    private valorB:number;

    constructor(valorAPm:number,valorBPm:number){
        this.valorA=valorAPm;
        this.valorB=valorBPm;
    }

    sumar(): number{
        return (this.valorA + this.valorB);
    }
    restar(): number{
        return (this.valorA - this.valorB);
    }
    multiplicar(): number{
        return (this.valorA * this.valorB);
    }
    dividir(): number{
        if(this.valorB == 0) return NaN; //No se puede dividir entre 0
        return (this.valorA / this.valorB);
    }
    potencia(): number{
        return (this.valorA ** this.valorB);
    }
    factorial(): number{
    if (this.valorA < 0) return NaN; //No existe factorial de negativos
    if (this.valorA === 0 || this.valorA === 1) return 1; //Caso 0 y 1 es 1
    let resultado = 1;
    for (let i = 2; i <= this.valorA; i++) {
        resultado *= i;
    }
    return resultado;
    }
}
//Caso de uso
const calc = new Calculadora(7, 5);
console.log(calc.sumar());
console.log(calc.restar());
console.log(calc.multiplicar());
console.log(calc.dividir());
console.log(calc.potencia());
console.log(calc.factorial());

console.log("")
console.log("Ejercicio 3")

//Ejercicio 3
class Cancion{
    titulo:string;
    genero:string;
    private autor:string;


//Metodos
     constructor(titulo: string, genero: string) {
        this.titulo = titulo;
        this.genero = genero;
        this.autor = "";
    }

    setAutor(autor: string): void {
        this.autor = autor;
    }
    getAutor(): string {
        return this.autor;
    }
    mostrarDatos(): void {
        console.log('Título ',this.titulo);
        console.log('Género: ', this.genero);
        console.log('Autor: ',this.autor);
    }
}
//Caso de uso
const cancion1 = new Cancion("Desde el rio", "Rock");
cancion1.setAutor("Pato Rockero");
console.log(cancion1.getAutor());
cancion1.mostrarDatos();

console.log("")
console.log("Ejercicio 4")

//Ejercicio 4
class Cuenta{
    private nombre:string;
    private cantidad:number;
    private tipoCuenta:string;
    private numeroCuenta:string;

    constructor(nombrePm:string,cantidadPm:number,tipoCuentaPm:string,numeroCuentaPm:string){
        this.nombre=nombrePm;
        this.cantidad=cantidadPm;
        this.tipoCuenta=tipoCuentaPm;
        this.numeroCuenta=numeroCuentaPm;
    }

    //Metodos
    depositar(cantidadIn:number){
        if(cantidadIn < 5){
            console.log("La cantidad debe ser mayor o igual a $5.00");
        }else{
            this.cantidad += cantidadIn;
            console.log(`Deposito de ${cantidadIn} realizado correctamente`)
        }
    }
    retirar(valor:number){
        if (valor < 5) console.log("Valor invalido")
        else if (valor > this.cantidad) console.log("Saldo insufiente para retiro")
        else{
            this.cantidad -= valor;
            console.log(`Retiro de ${valor}$ realizado correctamente`);
            console.log(`El nuevo saldo de cuenta es de: ${this.cantidad}$`);
        }
    }
    mostrarInfoCuenta(): void{
        console.log(`Titular: ${this.nombre}`);
        console.log(`Tipo: ${this.tipoCuenta}`)
        console.log(`Número cuenta: ${this.numeroCuenta}`)
    }
}
    //Caso de uso
    const cuentaAntonio = new Cuenta("Antonio Campo",500,"Ahorro","0567-4343-6060-1212");
    cuentaAntonio.depositar(25);
    cuentaAntonio.retirar(200);
    cuentaAntonio.mostrarInfoCuenta();

console.log("")
console.log("Ejercicio 5")

//Ejercicio 5
abstract class Persona {
    protected nombre: string;
    protected apellido: string;
    protected direccion: string;
    protected telefono: string;
    protected edad: number;

    constructor(nombrePm:string,apellidoPm:string,direccionPm:string,telefonoPm:string,edadPm:number) {
        this.nombre = nombrePm;
        this.apellido = apellidoPm;
        this.direccion = direccionPm;
        this.telefono = telefonoPm;
        this.edad = edadPm;
    }

    // Metodo de verificacion de edad
    esMayorDeEdad(): void {
        if (this.edad >= 18) {
            console.log(`${this.nombre} es mayor de edad.`);
        } else {
            console.log(`${this.nombre} es menor de edad.`);
        }
    }

    // Declaracion de metodo
    abstract mostrarDatos(): void;
}

class Empleado extends Persona {
    private sueldo:number;

    constructor(nombrePm:string,apellidoPm:string,direccionPm:string,telefonoPm:string,edadPm:number) {
        super(nombrePm, apellidoPm, direccionPm, telefonoPm, edadPm);
        this.sueldo = 0;
    }

    cargarSueldo(sueldo:number): void {
        this.sueldo=sueldo;
    }

    imprimirSueldo(): void {
        console.log(`Sueldo: $${this.sueldo}`);
    }

    // Implementación del metodo abstracto
    mostrarDatos(): void {
        console.log(`Nombre: ${this.nombre}`);
        console.log(`Apellido: ${this.apellido}`);
        console.log(`Dirección: ${this.direccion}`);
        console.log(`Teléfono: ${this.telefono}`);
        console.log(`Edad: ${this.edad}`);
    }
}

// Caso de uso
const empleado1 = new Empleado("Paco", "Miralvalle", "Salvador de el mundo", "7070-5040", 35);
empleado1.cargarSueldo(1500);
empleado1.mostrarDatos();
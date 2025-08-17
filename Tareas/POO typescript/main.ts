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
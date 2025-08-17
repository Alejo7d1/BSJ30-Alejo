//Declaracion de variables
let numeritoTexto = "Fer jeje salu2";

//Datos primitivos
let numero:number = 2;
let nombre:string = "jairo";
let activo:boolean = true;
let vacio:null = null;

//Tipos de datos que vamoss a rogar, rezar, intentar jurar y prometer no usar
let nose:any = "PUEDO SER CUALQUIER COSA";
let noDefinido:undefined = undefined;

console.log(numeritoTexto);
console.log(numero);

//Declaracion de funciones
function saludarA(nombreParam:string):string{
    return `Holiwis, ${nombreParam}`
}

console.log(saludarA("jairo"));

//Estructuras de datos
// Array
let arracito: number[] = [1,2,3,4];
//arraycito.push("asdad") no funciona


// Tupla
let arrayEspecifico : [number,string] = [27,"Juan"];


//Podemos llegar a tener 2 tipos de datos
// Variable: tipo1 | 2tipo
let dosTipos:null|string = null;

dosTipos = "";

//tipo de dato personalizado

 type Persona = {
    name : string,
    age : number,
 }

 let programador: Persona = {name:"Juan", age: 25};

 let fsj: Persona[] = [{name: "Joaquin", age:700},{name: "paco", age: 777}]


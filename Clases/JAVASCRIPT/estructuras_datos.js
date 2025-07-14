//objetos literales

let perro = {
    nombre:"Pikachu",
    edad: "38"
}

//Mostrar una caracteristica del perro
console.log(perro.nombre);

//clases
class Persona {
    constructor(){
        this.nombre = "paquitoneitor"

    }
}

//Array
let arraycitto = [18,45,34,45];

console.log(arraycitto[0]);

//Los objetos se tratan como array, ya que no existe array asociativo
let arrayAsociado = {
    nombre: "Papiro"
}

console.log(arrayAsociado['nombre']);

//Array multidimensional
let arrayMulti = [[1,2],[{nombre: "Papiro"}]];
console.log(arrayMulti[0]);
let cajadeIndiceCero = arrayMulti[0]
console.log(cajadeIndiceCero[1])

//Recorrer arrays
let nombre = ["darwin","Luz","Paco","Pacote"];

//Foreach
nombre.forEach()


//callback
function saludar(){
    console.log("Holiwis"); 'holiwis'
}

function funcionQueTieneCallBack(callback){
    console.log("Soy una funcion que te ejecuta"); 'Funcion que te ejecuta pa'
    callbackfn();
}

funcionQueUsaCallback(() => {
    console.log("Soy anonima"); 'Soy anonima'
    return "Jaime"
});


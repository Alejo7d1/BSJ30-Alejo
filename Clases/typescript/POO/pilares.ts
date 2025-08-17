//Paradigma -> modelo de programar


class Animal {
    especie: string;
    edad: number;
    genero: string;
    color: string;

    //Constructore
    constructor(especieParam:string,edadParam:number,generoParam:string,colorParam:string){
        this.especie = especieParam;
        this.edad = edadParam;
        this.genero = generoParam;
        this.color = colorParam;
    }
    //Metodos -> Funciones que van a pertenecer a una clase
    comer(){
        return "Comiendo... ñam,ñam,ñam";
    }

    //Abstraccion -> acceder a un objeto a traves de metodos publicos
    //Getters y Setters
    getEdad(){
        return this.edad;
    }

    setEdad(edadParam){
        this.edad = edadParam;
    }

    aumentarEdad(){
        this.edad += 1;
    }

}

const animalito = new Animal("Mamut",25,"Macho","Azul");
//Accedemos a un atributo del objeto instanciado(crando en base) de una clase
console.log(animalito.especie);

console.log(animalito.getEdad());

class Perro extends Animal{
    private raza: string;
    private nombre: string;

    constructor(especieParam:string,edadParam:number,generoParam:string,colorParam:string,
        razaParam: string, nombreParam: string){
        super(especieParam,edadParam,generoParam,colorParam);
        this.raza = razaParam;
        this.nombre = nombreParam;
    }
    ladrar(){
        return "guau wof guau";
    }
}

const perrito = new Perro("Perro",6,"Macho","amarillo","magico","Paco");

type User = {
    name: string,
    email: string,
    password: string,
    rol: string
}

//Uso de interfaces

let usuario2:User = {
    name:"paco",
    email: "paco@mail.com",
    password: "12345678",
    rol: "Admin"
}

interface IUser {
    name: string,
    email: string,
    password: string,
    rol: string

    login():string;
}

let usuario3:IUser = {
    name: "Juan",
    email: "juan@arco.com",
    password: "12345678",
    rol: "Admin",
    login() {
        return "Logueadito pai"
    },
}

/* Ejemplo de uso */
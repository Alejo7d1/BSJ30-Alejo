
class Animal{
    private nombre:string;
    private especie:string;

    constructor(nombreParam:string,especieParam:string){
        this.nombre = nombreParam;
        this.especie = especieParam;
    }

    comer():string{
        return "estoy comiendo"
    }

    getAnimal():Animal{
        return this;
    }
}

let d10s:Animal = new Animal("m","chucho");
console.log(d10s.getAnimal());

class Gato extends Animal{
    private raza: string;
    private color: string;

    constructor(nombreParam:string,especieParam:string,razaParam:string,colorParam:string){
        super(nombreParam,especieParam);
        this.raza = razaParam;
        this.color = colorParam;
    }

    maullar():string{
        return "Meow";
    }
}

class Perro extends Animal implements IAnimal{
    raza: string;
    color: string;

        hacerRuido(): string {
            return "Wachu wachu wa, wachu wachu wa"
        }
}

interface IAnimal {
    //Los atributos tienen que quedar publicos
    raza:string;
    color:string;

    hacerRuido():string;
}

//Paradigma -> modelo de programar
var Animal = /** @class */ (function () {
    //Constructore
    function Animal(especieParam, edadParam, generoParam, colorParam) {
        this.especie = especieParam;
        this.edad = edadParam;
        this.genero = generoParam;
        this.color = colorParam;
    }
    //Metodos -> Funciones que van a pertenecer a una clase
    Animal.prototype.comer = function () {
        return "Comiendo... ñam,ñam,ñam";
    };
    //Getters y Setters
    Animal.prototype.getEdad = function () {
        return this.edad;
    };
    Animal.prototype.setEdad = function (edadParam) {
        this.edad = edadParam;
    };
    return Animal;
}());
var animalito = new Animal("Mamut", 25, "Macho", "Azul");
//Accedemos a un atributo del objeto instanciado(crando en base) de una clase
console.log(animalito.especie);
console.log(animalito.getEdad());

//Ejercicio 1
let edad = 4;

if(edad >= 18){
    console.log("Mayor de edad")
}else{
    console.log("No es mayor de edad")
}

//Ejercicio 2
let alumno = {
    nombre:"Juan Paco",
    carnet:"123456P",
    notaExamen:8,
    notaTareas:10,
    asistencia:7,
    investigación:4
};

function calcularNotaFinal(alumno) {
    let total = (alumno.notaExamen * 0.2) + (alumno.notaTareas * 0.4) + 
    (alumno.asistencia * 0.1) +(alumno.investigación * 0.3);
    return total;
}

console.log(alumno.nombre + " " + alumno.carnet);
console.log("nota final " + calcularNotaFinal(alumno));

//ejercicio 3
let empleado = {
    nombre: "Juan",
    categoria: 'B',
    salario: 500.00
}

function darAumento (empleado){
    let aumento;
    switch (empleado.categoria){
        case 'A':
            aumento = empleado.salario * 0.15;
            break;
        case 'B':
            aumento = empleado.salario * 0.3;
            break;
        case 'C':
            aumento = empleado.salario * 0.1;
            break;
        case 'D':
            aumento = empleado.salario * 0.2;
            break;
    }
    return aumento;
}


console.log(empleado.nombre)
console.log("Categoría: " + empleado.categoria)
console.log("Salario base: " + empleado.salario + " Aumento: " + darAumento(empleado))
console.log("Nuevo salario: " + (empleado.salario + darAumento(empleado)))

//Ejercicio 4
let numero1 = 1;
let numero2 = 1;

if(numero1>numero2){
    console.log(numero1 + " es mayor");
}else if(numero2 > numero1){
   console.log(numero2 + " es mayor");
}else{
    console.log("Los numeros son iguales");
}

//Ejercicio 5

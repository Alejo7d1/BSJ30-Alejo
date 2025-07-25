//Ejercicio 1
function verificarEdad() {
    const edad = parseFloat(prompt("Ingrese su edad:"));
    if (isNaN(edad)) {
        console.log("Por favor, ingrese una edad válida.");
    } else if (edad >= 18) {
        console.log("Mayor de edad");
    } else {
        console.log("No es mayor de edad");
    }
}

//Ejercicio 2
function solicitarDatosAlumno() {
    const modeloA = prompt("Ingrese el modelo del alumno:");
    const carnetA = prompt("Ingrese el carnet del alumno:");
    const notaExamenA = parseFloat(prompt("Nota del examen:"));
    const notaTareasA = parseFloat(prompt("Nota de tareas :"));
    const asistenciaA = parseFloat(prompt("Ingrese la nota de asistencias:"));
    const investigacionA = parseFloat(prompt("Nota de investigación:"));

    let alumno = {
    modelo: modeloA,
    carnet: carnetA,
    notaExamen: notaExamenA,
    notaTareas: notaTareasA,
    asistencia: asistenciaA,
    investigacion: investigacionA
    }

    let total = (alumno.notaExamen * 0.2) + (alumno.notaTareas * 0.4) + 
    (alumno.asistencia * 0.1) +(alumno.investigacion * 0.3);

    console.log(alumno.modelo + " " + alumno.carnet);
    console.log("nota final " + total);
    };



//ejercicio 3
function darAumento (){
    const modelo = prompt("Ingrese el modelo del empleado:");
    const categoria = prompt("Ingrese la categoría del empleado (A, B, C, D):").toUpperCase();
    const salario = parseFloat(prompt("Ingrese el salario base del empleado:"));

    let empleado = {
    modelo: modelo,
    categoria: categoria,
    salario: salario
}

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

    console.log(empleado.modelo)
    console.log("Categoría: " + empleado.categoria)
    console.log("Salario base: " + empleado.salario + " Aumento: " + aumento)
    console.log("Nuevo salario: " + (empleado.salario + aumento))
}

//Ejercicio 4
function numeroMayor() {
    let numero1 = parseFloat(prompt("Ingrese el primer número:"));
    let numero2 = parseFloat(prompt("Ingrese el segundo número:"));

    if (numero1 > numero2) {
        console.log(numero1 + " es mayor");
    } else if (numero2 > numero1) {
        console.log(numero2 + " es mayor");
    } else {
        console.log("Los números son iguales");
    }
}

//Ejercicio 5
function calcularDescuentoCarrito() {
    const carro = document.getElementById('carro').value;
    let descuento = 0;
    let modelo = "missingNo";

    switch (carro) {
        case "FIESTA":
            descuento = 5;
            modelo = "FORD FIESTA";
            break;
        case "FOCUS":
            descuento = 10;
            modelo = "FORD FOCUS";
            break;
        case "ESCAPE":
            descuento = 20;
            modelo = "FORD ESCAPE";
            break;
        default:
            document.getElementById('resultado').textContent = "Ese modelo no existe";
            return;
    }

    document.getElementById('resultado').textContent =
        `El modelo ${modelo} tiene un descuento del ${descuento}%`;
}

//Ejercicio 6
function calcularDescuentoViaje(){
    let origen = prompt("¿De donde sales?");
    let destino = prompt("¿A donde vas?");
    if (origen === "ciudad de Palma" && destino === "La costa del Sol") {
        console.log("El descuento es del 5%");
    }else if (destino === "Panchimalco") {
        console.log("El descuento es del 10%");
    }else if (destino === "Puerto el Triunfo") {
        console.log("El descuento es del 15%");
    }else{
        console.log("No hay descuento disponible para esta ruta");
    }
}

//Ejercicio 7
function calcularValores(){
    let valores = [];
    for (let i = 1; i <= 10; i++) {
        let valor = parseFloat(prompt(`Ingrese un valor ${i}/10:`));
        if (isNaN(valor)) {
            console.log("Error, un valor no numérico fue ingresado");
            valores.push(null);
        } else {
            valores.push(valor);
        }
    }

    let negativos = 0;
    let positivos = 0;
    let multiploDe15 = 0;
    let acumuladoPares = 0;

    for (let i = 0; i < 10; i++) {
        if (valores[i] < 0) negativos++;
        if (valores[i] > 0) positivos++;
        if (valores[i] % 15 === 0) multiploDe15++;
        if (valores[i] % 2 === 0) {
            acumuladoPares += valores[i];
        }
        }

    console.log("Cantidad de números negativos:", negativos);
    console.log("Cantidad de números positivos:", positivos);
    console.log("Cantidad de números múltiplos de 15:", multiploDe15);
    console.log("Suma de números pares:", acumuladoPares);
    }

//Ejercicio 8
function tablaMultiplicar() {
    let numero = parseInt(prompt("Numero del que quieras saber la tabla de multiplicar"));
    for (let i = 1; i <= 10; i++) {
        console.log(numero + "x" + [i] + "=" + (numero * i));
    }
}

//Ejercicio 9
function temperatura() {
    let cel = parseFloat(prompt("Ingrese la temperatura en Celsius"));
    let Fah = (cel * 9/5) + 32;
    console.log("Temperatura en Fah:", Fah);

    if (Fah >= 14 && Fah < 32) {
        console.log("Temperatura baja");
    } else if (Fah >= 32 && Fah < 68) {
        console.log("Temperatura adecuada");
    } else if (Fah >= 68 && Fah < 96) {
        console.log("Temperatura alta");
    } else {
        console.log("Temperatura desconocida");
    }
}

//Ejercicio 10
function promedioEdadesTurnos() {
    function pedirEdades(cantidad, turno) {
        let edades = [];
        for (let i = 1; i <= cantidad; i++) {
            let edad = parseInt(prompt(`Ingrese la edad del estudiante ${i} del turno ${turno}:`));
            if (isNaN(edad) || edad <= 0) {
                console.log(`Edad inválida para el estudiante ${i} del turno ${turno}.`);
                i--;
            } else {
                edades.push(edad);
            }
        }
        return edades;
    }

    let edadesManiana = pedirEdades(5, "mañana");
    let edadesTarde = pedirEdades(6, "tarde");
    let edadesNoche = pedirEdades(11, "noche");

    function calcularPromedio(edades) {
        let suma = edades.reduce((acc, val) => acc + val, 0);
        return suma / edades.length;
    }

    let promedioManiana = calcularPromedio(edadesManiana);
    let promedioTarde = calcularPromedio(edadesTarde);
    let promedioNoche = calcularPromedio(edadesNoche);

    console.log(`Promedio de edades turno mañana: ${promedioManiana.toFixed(2)}`);
    console.log(`Promedio de edades turno tarde: ${promedioTarde.toFixed(2)}`);
    console.log(`Promedio de edades turno noche: ${promedioNoche.toFixed(2)}`);

    let mayor = Math.max(promedioManiana, promedioTarde, promedioNoche);
    let mensaje = "";

    switch (mayor) {
        case promedioManiana:
            mensaje = "El turno mañana tiene el promedio de edades mayor.";
            break;
        case promedioTarde:
            mensaje = "El turno tarde tiene el promedio de edades mayor.";
            break;
        case promedioNoche:
            mensaje = "El turno noche tiene el promedio de edades mayor.";
            break;
    }
    console.log(mensaje);

    let resultado = 
        `Promedio mañana: ${promedioManiana.toFixed(2)}<br>` +
        `Promedio tarde: ${promedioTarde.toFixed(2)}<br>` +
        `Promedio noche: ${promedioNoche.toFixed(2)}<br>` +
        `<strong>${mensaje}</strong>`;
    document.getElementById('resultadoPromedios').innerHTML = resultado;
}

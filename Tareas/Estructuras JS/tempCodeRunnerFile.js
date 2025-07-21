function solicitarDatosAlumno() {
    const nombreA = prompt("Ingrese el nombre del alumno:");
    const carnetA = prompt("Ingrese el carnet del alumno:");
    const notaExamenA = parseFloat(prompt("Nota del examen:"));
    const notaTareasA = parseFloat(prompt("Nota de tareas :"));
    const asistenciaA = parseFloat(prompt("Ingrese la nota de asistencias:"));
    const investigacionA = parseFloat(prompt("Nota de investigación:"));

    let alumno = {
    nombre: nombreA,
    carnet: carnetA,
    notaExamen: notaExamenA,
    notaTareas: notaTareasA,
    asistencia: asistenciaA,
    investigacion: investigacionA
    }

    let total = (alumno.notaExamen * 0.2) + (alumno.notaTareas * 0.4) + 
    (alumno.asistencia * 0.1) +(alumno.investigacion * 0.3);

    console.log(alumno.nombre + " " + alumno.carnet);
    console.log("nota final " + total);
    };
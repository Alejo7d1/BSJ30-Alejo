//console.log("Holiwis");
const contenedorCarrito = document.getElementById('cuerpo-carrito');
let cursosCarrito = [];

function vaciarCarrito(evento){
    console.log("Yo soy vaciar carrito");

    cursosCarrito = [];
    contenedorCarrito.innerHTML = "";
}

function agregarCurso(evento){
    console.log("Soy el agregar curso");
    //console.log(evento.target.parentElement.parentElement);

    let curso = leerDatosCurso(evento.target.parentElement.parentElement);
    console.log(curso);

    const existe = cursosCarrito.some ((cursoArr) => cursoArr.id == curso.id)

    if (existe){
        cursosCarrito.map((cursoArr)=>{
            if(cursoArr.id === curso.id){
                cursoArr.cantidad += 1;
                //Aumentar precio
                cursoArr.precio = cursoArr.precio.substring(1);
                //Transformación de string a entero
                cursoArr.precio = parseFloat(cursoArr.precio);

                //Aumentamos el precio
                cursoArr.precio += cursoArr.precio

                cursoArr.precio = `$${cursoArr.precio}`;

                return cursoArr;
            }
        })
    }else{
        cursosCarrito.push(curso)
    }
    console.log(cursosCarrito)
    pintarCarritoHTML();
}

function leerDatosCurso(curso){
    console.log(curso);

    console.log(curso.querySelector('a').getAttribute('data-id'))
    console.log(curso.querySelector('img').src);
    console.log(curso.querySelector('h4').textContent);
    console.log(curso.querySelector('h5').textContent);
    
    const infoCurso = {
        id: curso.querySelector('a').getAttribute('data-id'),
        imagen: curso.querySelector('img').src,
        nombre: curso.querySelector('h4').textContent,
        precio: curso.querySelector('h5').textContent,
        cantidad: 1
    }

    return infoCurso;
}

function pintarCarritoHTML(){
    contenedorCarrito.innerHTML = ""

    cursosCarrito.map((curso) => {
        //crear una fila
        let fila = document.createElement('tr');

        fila.innerHTML = `
        <td><img src="${curso.imagen}"/></td>
        <td>${curso.nombre}</td>
        <td>${curso.precio}</td>
        <td>${curso.cantidad}</td>
        <td><a class="btn btn-danger" onclick="eliminarCurso(${curso.id})">Eliminar</a></td>
        `

        contenedorCarrito.appendChild(fila)
    })
}

function eliminarCurso (id) {
    console.log(id)
    cursosCarrito.map((curso) => {
        if(curso.id == id){
            //va a guardar los cursos que sean diferentes a ese id
            cursosCarrito = cursosCarrito.filter(curso => curso.id != id)
        }
    })
    pintarCarritoHTML();
}



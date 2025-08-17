import { useCallback, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
//Las funciones adentro de un componente decclarenlas con CamelCase
  const peticionesApi = () =>{
    //Peticion a una API
    fetch('https://rickandmortyapi.com/api/character')
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
  }

  const peticionesApiAA = async() => {
    //bloque de manejo de errores
    try{
    //Reemplezo al primer .then
    let response = await fetch ('https://rickandmortyapi.com/api/character')
    console.log(response);
    //Reemplazo para el segundo .then
    let data = await response.json();
    console.log(data);
    }catch(error){
      console.error(error)
    }

  }

  return (
    <>
      <h1>Holiwis</h1>
      <h2>Chauchis</h2>
      <button onClick={peticionesApi}>Apretame para traer datos</button>
      <button onClick={peticionesApiAA}>Apretame para traer datos de otra manera</button>
    </>
  )
}

export default App

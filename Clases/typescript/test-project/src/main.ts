import './style.css'
import typescriptLogo from './typescript.svg'
import viteLogo from '/vite.svg'
import { setupCounter } from './counter.ts'

document.querySelector<HTMLDivElement>('#app')!.innerHTML = `
<div>
  <h1>Holiwissss</h1>
  <button id="btnMagia">MAGIA!</button>
</div>
`
let btnDOM = document.getElementById('btnMagia') as HTMLButtonElement;

console.log(btnDOM)

//Hacer que el boton haga un alert que diga chauchis

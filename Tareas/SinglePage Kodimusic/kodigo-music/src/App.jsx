import './App.css'
import { useState } from "react";
import Footer from './components/Footer'
import Main from './components/Main'
import Navbar from './components/Navbar'

function App() {
  const [search, setSearch] = useState("coldplay");

  return (
    <div className="App">
      <Navbar onSearch={setSearch} />
      <Main search={search} />
      <Footer/>
    </div>
  )
}

export default App

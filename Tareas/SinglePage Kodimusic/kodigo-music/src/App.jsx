import './App.css'
import { useState } from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

import Footer from './components/Footer'
import Main from './components/Main'
import Navbar from './components/Navbar'
import { RegisterComponent } from './components/Register'

function App() {
  const [search, setSearch] = useState("coldplay");

  return (
    <Router>
      <div className="App">
        <Navbar onSearch={setSearch} />

        <Routes>
          <Route path="/" element={<Main search={search} />} />
          <Route path="/register" element={<RegisterComponent/>} />
        </Routes>

        <Footer />
      </div>
    </Router>
  )
}

export default App


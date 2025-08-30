import "./styles/Navbar.css";
import { useState } from "react";
import { Link } from "react-router-dom";

function Navbar({ onSearch }) {
  const [query, setQuery] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    if (query.trim() !== "") {
      onSearch(query);
    }
  };

  return (
    <nav className="navbar">
      <div className="navbar_left">
        <img
          className="kodigo_icon"
          src="//academy.kodigo.org/pluginfile.php/1/theme_mb2nl/favicon/1750778830/logo-kodigo%20-%20copia.ico"
          alt="Kodigo Logo"
        />
      </div>
      <div className="navbar_center">
        <button className="navbar_button">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            fill="currentColor"
            className="bi bi-house"
            viewBox="0 0 16 16"
            >
              <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
          </svg>
        </button>
        <form onSubmit={handleSubmit}>
          <input
            type="text"
            className="navbar_search"
            placeholder="¿Qué artista tienes en mente?"
            value={query}
            onChange={(e) => setQuery(e.target.value)}
          />
        </form>
      </div>
      <div className="navbar_right">
        <nav>
          <Link to="/register">
            <button className="navbar_button">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                fill="currentColor"
                className="bi bi-person-circle"
                viewBox="0 0 16 16"
              >
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path
                  fillRule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
                />
              </svg>
            </button>
          </Link>
        </nav>
      </div>
    </nav>
  );
}

export default Navbar;

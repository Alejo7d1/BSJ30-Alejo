import { useEffect, useState } from "react";
import "./styles/Main.css";

function Main({ search }) {
  const [albums, setAlbums] = useState([]);

  //Lista las canciones desde la base de API de apple music
  useEffect(() => {
    if (!search) return;

    fetch(
      `https://itunes.apple.com/search?term=${encodeURIComponent(search)}&entity=album&limit=25`
    )
      .then(res => res.json())
      .then(data => {
        setAlbums(data.results || []);
      })
      .catch(err => {
        console.error(err);
        setAlbums([]);
      });
  }, [search]);

  return (
    <main>
      <h1 className="result">Resultado búsqueda: {search}</h1>

      <div className="cards" style={{ display: "flex", flexWrap: "wrap", gap: "1rem" }}>
        {albums.length > 0 ? (
          albums.slice(0, 21).map((album) => (
            <div key={album.collectionId} className="album-card">
              <img
                src={album.artworkUrl100.replace("100x100", "300x300")}
                alt={album.collectionName}
              />
              <h3>{album.collectionName}</h3>
              <p>{album.artistName} — {new Date(album.releaseDate).getFullYear()}</p>
            </div>
          ))
        ) : (
          <p className="no-results">No se encontraron resultados</p>
        )}
      </div>
    </main>
  );
}

export default Main;




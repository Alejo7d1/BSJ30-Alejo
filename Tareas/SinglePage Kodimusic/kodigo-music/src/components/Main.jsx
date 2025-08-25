import { useEffect, useState } from "react";
import "./styles/Main.css";

function Main({ search }) {
  const [albums, setAlbums] = useState([]);

  useEffect(() => {
    if (!search) return;

    const fetchAlbums = async () => {
      try {
        const resArtist = await fetch(`https://www.theaudiodb.com/api/v1/json/2/search.php?s=${encodeURIComponent(search)}`);
        const dataArtist = await resArtist.json();
        const artist = dataArtist.artists?.[0];
        if (!artist) {
          setAlbums([]);
          return;
        }

        const resAlbum = await fetch(`https://www.theaudiodb.com/api/v1/json/2/album.php?i=${artist.idArtist}`);
        const dataAlbum = await resAlbum.json();
        setAlbums(dataAlbum.album || []);
      } catch (err) {
        console.error(err);
        setAlbums([]);
      }
    };

    fetchAlbums();
  }, [search]);

  return (
    <main>
      <h1 className="result">Resultado búsqueda: {search}</h1>

      <div className="cards" style={{ display: "flex", flexWrap: "wrap", gap: "1rem" }}>
        {albums.slice(0, 28).map(album => (
          <div key={album.idAlbum} className="album-card">
            <img
              src={album.strAlbumThumb || "https://via.placeholder.com/200"}
              alt={album.strAlbum}
            />
            <h3>{album.strAlbum}</h3>
            <p>{album.strArtist} - {album.intYearReleased}</p>
          </div>
        ))}

        {albums.length === 0 && <p className="no-results">Por un error de acceso a la API no encuentra bien los resultados y solo funciona coldplay xD</p>}
      </div>
    </main>
  );
}

export default Main;



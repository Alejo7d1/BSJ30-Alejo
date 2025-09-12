import './App.css'
import { useEffect, useState } from "react";
import { db } from "./FirebaseConfig";
import { collection, addDoc, getDocs, updateDoc, doc, deleteDoc  } from "firebase/firestore";

function App() {
  const [task, setTask] = useState("");
  const [tasks, setTasks] = useState([]);

  const tasksCollection = collection(db, "tasks");

  // GET obtener todas las tareas
  const getTasks = async () => {
    const data = await getDocs(tasksCollection);
    setTasks(data.docs.map((doc) => ({ ...doc.data(), id: doc.id })));
  };

  // POST Agregar notas
  const addTask = async (e) => {
    e.preventDefault();
    if (!task.trim()) return;

    // Elige un color aleatorio
    const colors = ["#fef08a", "#fbcfe8", "#bfdbfe", "#bbf7d0", "#fde68a", "#fecaca"];
    const randomColor = colors[Math.floor(Math.random() * colors.length)];

    const now = new Date();
    await addDoc(tasksCollection, {
      text: task,
      completed: false,
      createdAt: now.toISOString(),
      color: randomColor,
    });

    setTask("");
    getTasks();
  };
 
  // Marcar como finalizada y se elimina en 20 segundos
  const finalizeTask = async (id) => {
    const taskDoc = doc(db, "tasks", id);

    // Marcar como finalizada
    await updateDoc(taskDoc, { completed: true });
    getTasks();
    setTimeout(async () => {
      await deleteDoc(taskDoc);
      getTasks();
    }, 20000); //20 segundos
  };

  useEffect(() => {
    getTasks();
  }, []);

  return (
    <div className="container">
      <h1 className="title">TODO LIST</h1>

      {/* Notas (si hay) */}
      <div className="note-grid">
        {tasks.map((t) => (
          <div
            key={t.id}
            className={`note-card ${t.completed ? "completed" : ""}`}
            style={{ backgroundColor: t.color }}
          >
            <p className="task-text">{t.text}</p>
            <p className="task-date">
              {new Date(t.createdAt).toLocaleString()}
            </p>
            {!t.completed && (
              <button
                onClick={() => finalizeTask(t.id)}
                className="btn finalize-btn"
              >
                Finalizar
              </button>
            )}
          </div>
        ))}

        {/* Agregar nota */}
        <form onSubmit={addTask} className="note-card add-note">
          <textarea
            value={task}
            onChange={(e) => setTask(e.target.value)}
            placeholder="Escribe una nota..."
            className="input-note"
          />
          <button type="submit" className="btn add-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <           path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
            </svg>
          </button>
        </form>
      </div>
    </div>
  );
}

export default App;


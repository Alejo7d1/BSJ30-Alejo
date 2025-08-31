
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

const firebaseConfig = {
  apiKey: "AIzaSyDtUKUFsb4eRFi-zPb7a8j4q9-tZbskUSA",
  authDomain: "kodimusic-61063.firebaseapp.com",
  projectId: "kodimusic-61063",
  storageBucket: "kodimusic-61063.firebasestorage.app",
  messagingSenderId: "293699517089",
  appId: "1:293699517089:web:ca75df0d9cb97b7796cee0"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyCGt_vOcPCYwOWxYP0rPGXSBavHjPm1IKg",
  authDomain: "notas7d1.firebaseapp.com",
  projectId: "notas7d1",
  storageBucket: "notas7d1.firebasestorage.app",
  messagingSenderId: "313070105643",
  appId: "1:313070105643:web:77af200cc4cff99a4c666e"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const db = getFirestore(app);
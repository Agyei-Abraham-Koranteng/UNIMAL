// Import the functions from the Firebase SDK
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore.js";
import { getStorage } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-storage.js";

// my web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDX0tDTUxh7NG_Q2K5con6CioTvF4ATwdU",
  authDomain: "unimall-86229.firebaseapp.com",
  projectId: "unimall-86229",
  storageBucket: "unimall-86229.firebasestorage.app",
  messagingSenderId: "278448298795",
  appId: "1:278448298795:web:d2a30a3deadb91317c836e",
  measurementId: "G-XZJ0W907ZY"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Initialize Firebase Authentication and get a reference to the service
const auth = getAuth(app);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);

// Initialize Cloud Storage and get a reference to the service
const storage = getStorage(app);

// Export the services so they can be used in other files
export { auth, db, storage };
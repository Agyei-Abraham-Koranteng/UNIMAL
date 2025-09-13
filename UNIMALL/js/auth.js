// Import Firebase functions
import { 
    createUserWithEmailAndPassword, 
    signInWithEmailAndPassword,
    onAuthStateChanged,
    signOut 
} from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";
import { doc, setDoc, getDoc } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore.js";
import { auth, db } from './firebase-config.js';

// Handle registration
document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    
    if (registerForm) {
        registerForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const userType = document.getElementById('userType').value;
            
            try {
                // Create user in Firebase Authentication
                const userCredential = await createUserWithEmailAndPassword(auth, email, password);
                const user = userCredential.user;
                
                // Create user document in Firestore based on user type
                if (userType === 'customer') {
                    await setDoc(doc(db, "customers", user.uid), {
                        email: email,
                        createdAt: new Date(),
                        userType: 'customer'
                    });
                    alert('Customer account created successfully!');
                    window.location.href = 'login.html';
                } else if (userType === 'vendor') {
                    await setDoc(doc(db, "vendors", user.uid), {
                        email: email,
                        createdAt: new Date(),
                        status: 'pending', // Admin needs to approve
                        userType: 'vendor'
                    });
                    alert('Vendor application submitted! Waiting for admin approval.');
                    window.location.href = 'login.html';
                }
            } catch (error) {
                console.error("Error creating account:", error);
                alert("Error: " + error.message);
            }
        });
    }

    // Handle login
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        try {
            const userCredential = await signInWithEmailAndPassword(auth, email, password);
            const user = userCredential.user;
            
            // Check if user is a vendor first
            const vendorDoc = await getDoc(doc(db, "vendors", user.uid));
            if (vendorDoc.exists()) {
                const vendorData = vendorDoc.data();
                if (vendorData.status === 'approved') {
                    alert('Vendor login successful! Redirecting to dashboard.');
                    window.location.href = '../vendor/vendor-dashboard.html';
                    return;
                } else {
                    alert('Your vendor account is pending approval. Please wait for admin approval.');
                    await signOut(auth);
                    return;
                }
            }
            
            // Check if user is a customer
            const customerDoc = await getDoc(doc(db, "customers", user.uid));
            if (customerDoc.exists()) {
                alert('Login successful! Redirecting to homepage.');
                window.location.href = '../index.html';
                return;
            }
            
            // Check if user is an admin
            const adminDoc = await getDoc(doc(db, "admins", user.uid));
            if (adminDoc.exists()) {
                alert('Admin login successful! Redirecting to admin panel.');
                window.location.href = '../admin/admin-dashboard.html';
                return;
            }
            
            // If no user document found
            alert('User profile not found. Please register first.');
            await signOut(auth);
            
        } catch (error) {
            console.error("Error logging in:", error);
            alert("Error: " + error.message);
        }
    });
}

// Track authentication state
onAuthStateChanged(auth, (user) => {
    if (user) {
        // User is signed in
        console.log("User is logged in:", user.uid);
        // We'll use this later to show/hide navigation elements
    } else {
        // User is signed out
        console.log("User is logged out");
    }
});

// Logout function
window.logout = async function() {
    try {
        await signOut(auth);
        alert('Logged out successfully');
        window.location.href = 'login.html';
    } catch (error) {
        console.error("Error signing out:", error);
    }
}});
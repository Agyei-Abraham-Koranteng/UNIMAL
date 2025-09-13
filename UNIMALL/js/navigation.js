import { auth } from './firebase-config.js';
import { onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";
import { doc, getDoc } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore.js";
import { db } from './firebase-config.js';

// Function to load navigation
function loadNavigation() {
  let navigation = `
    <nav>
      <div class="nav-brand">Multi-Vendor Store</div>
      <div class="nav-links">
        <a href="../index.html">Home</a>
      </div>
    </nav>
  `;

  // Add navigation to the top of the body
  document.body.insertAdjacentHTML('afterbegin', navigation);

  // Check auth state to update navigation
  onAuthStateChanged(auth, (user) => {
    const navLinks = document.querySelector('.nav-links');
    navLinks.innerHTML = `
      <a href="../index.html">Home</a>
    `;

    if (user) {
      // Check if user is a vendor
      getDoc(doc(db, "vendors", user.uid)).then((vendorDoc) => {
        if (vendorDoc.exists() && vendorDoc.data().status === 'approved') {
          // User is an approved vendor
          navLinks.innerHTML += `
            <a href="../products.html">Products</a>
            <a href="../cart.html">Cart</a>
            <a href="../vendor/vendor-dashboard.html">Vendor Dashboard</a>
            <a href="#" onclick="logout()">Logout</a>
          `;
        } else {
          // User is logged in but not a vendor
          navLinks.innerHTML += `
            <a href="../products.html">Products</a>
            <a href="../cart.html">Cart</a>
            <a href="#" onclick="logout()">Logout</a>
          `;
        }
      });
    } else {
      // User is logged out
      navLinks.innerHTML += `
        <a href="../products.html">Products</a>
        <a href="../cart.html">Cart</a>
        <a href="../login.html">Login</a>
        <a href="../register.html">Register</a>
      `;
    }
  });
}
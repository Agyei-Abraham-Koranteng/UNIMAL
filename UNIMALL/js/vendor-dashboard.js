// Import Firebase functions
import { collection, query, where, getDocs, orderBy, limit } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore.js";
import { auth, db } from './firebase-config.js';
import { onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";


// Import Firebase functions
import { collection, query, where, getDocs, orderBy, limit, doc, getDoc } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore.js";
import { auth, db } from './firebase-config.js';
import { onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";

// Check if user is authenticated and is an approved vendor
onAuthStateChanged(auth, async (user) => {
    if (user) {
        try {
            // Check if user is a vendor
            const vendorDoc = await getDoc(doc(db, "vendors", user.uid));
            if (!vendorDoc.exists()) {
                alert('You are not registered as a vendor.');
                await signOut(auth);
                window.location.href = '../login.html';
                return;
            }
            
            const vendorData = vendorDoc.data();
            if (vendorData.status !== 'approved') {
                alert('Your vendor account is not yet approved.');
                await signOut(auth);
                window.location.href = '../login.html';
                return;
            }
            
            // Load dashboard data for approved vendor
            loadDashboardData(user.uid);
        } catch (error) {
            console.error("Error checking vendor status:", error);
            alert("Error checking vendor status: " + error.message);
            window.location.href = '../login.html';
        }
    } else {
        // User is not signed in, redirect to login
        window.location.href = '../login.html';
    }
});

// Check if user is authenticated and is a vendor
onAuthStateChanged(auth, async (user) => {
    if (user) {
        // Check if user is a vendor
        const vendorDoc = await getDoc(doc(db, "vendors", user.uid));
        if (!vendorDoc.exists() || vendorDoc.data().status !== 'approved') {
            // User is not an approved vendor, redirect to homepage
            alert('You do not have vendor access or your account is not yet approved.');
            window.location.href = '../index.html';
            return;
        }
        
        // Load dashboard data
        loadDashboardData(user.uid);
    } else {
        // User is not signed in, redirect to login
        window.location.href = '../login.html';
    }
});

async function loadDashboardData(vendorId) {
    try {
        // Get product count
        const productsQuery = query(collection(db, "products"), where("vendorId", "==", vendorId));
        const productsSnapshot = await getDocs(productsQuery);
        document.getElementById('totalProducts').textContent = productsSnapshot.size;
        
        // Get order counts (this is a simplified version)
        const ordersQuery = query(collection(db, "orders"), where("vendorId", "==", vendorId));
        const ordersSnapshot = await getDocs(ordersQuery);
        document.getElementById('totalOrders').textContent = ordersSnapshot.size;
        
        // For simplicity, we'll assume all orders are pending
        document.getElementById('pendingOrders').textContent = ordersSnapshot.size;
        
        // Get recent products
        const recentProductsQuery = query(
            collection(db, "products"), 
            where("vendorId", "==", vendorId),
            orderBy("createdAt", "desc"),
            limit(5)
        );
        const recentProductsSnapshot = await getDocs(recentProductsQuery);
        displayRecentProducts(recentProductsSnapshot);
    } catch (error) {
        console.error("Error loading dashboard data:", error);
        alert("Error loading dashboard data: " + error.message);
    }
}

function displayRecentProducts(snapshot) {
    const productsContainer = document.getElementById('recentProductsList');
    productsContainer.innerHTML = '';
    
    if (snapshot.empty) {
        productsContainer.innerHTML = '<p>No products found. Add your first product!</p>';
        return;
    }
    
    snapshot.forEach(doc => {
        const product = doc.data();
        const productCard = `
            <div class="product-card">
                <img src="${product.imageUrl || 'https://via.placeholder.com/200'}" alt="${product.title}" class="product-image">
                <div class="product-info">
                    <h3 class="product-title">${product.title}</h3>
                    <p class="product-price">₦${product.price.toLocaleString()}</p>
                </div>
            </div>
        `;
        productsContainer.innerHTML += productCard;
    });
}
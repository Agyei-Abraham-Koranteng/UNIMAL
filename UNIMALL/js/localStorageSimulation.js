// localStorage simulation for development
class LocalStorageDB {
    constructor() {
        this.users = JSON.parse(localStorage.getItem('users')) || [];
        this.products = JSON.parse(localStorage.getItem('products')) || [];
        this.orders = JSON.parse(localStorage.getItem('orders')) || [];
        this.vendors = JSON.parse(localStorage.getItem('vendors')) || [];
        this.admins = JSON.parse(localStorage.getItem('admins')) || [];
        
        // Create a default admin if none exists
        if (this.admins.length === 0) {
            this.admins.push({
                uid: 'admin-1',
                email: 'admin@example.com',
                createdAt: new Date(),
                userType: 'admin'
            });
            this.saveData();
        }
    }
    
    saveData() {
        localStorage.setItem('users', JSON.stringify(this.users));
        localStorage.setItem('products', JSON.stringify(this.products));
        localStorage.setItem('orders', JSON.stringify(this.orders));
        localStorage.setItem('vendors', JSON.stringify(this.vendors));
        localStorage.setItem('admins', JSON.stringify(this.admins));
    }
    
    // User methods
    createUser(userData) {
        this.users.push(userData);
        this.saveData();
        return userData;
    }
    
    findUserByEmail(email) {
        return this.users.find(user => user.email === email);
    }
    
    findUserById(uid) {
        return this.users.find(user => user.uid === uid);
    }
    
    // Vendor methods
    createVendor(vendorData) {
        this.vendors.push(vendorData);
        this.saveData();
        return vendorData;
    }
    
    findVendorById(uid) {
        return this.vendors.find(vendor => vendor.uid === uid);
    }
    
    // Product methods
    createProduct(productData) {
        this.products.push(productData);
        this.saveData();
        return productData;
    }
    
    findProductsByVendorId(vendorId) {
        return this.products.filter(product => product.vendorId === vendorId);
    }
    
    // Admin methods
    findAdminById(uid) {
        return this.admins.find(admin => admin.uid === uid);
    }
}

// Create a global instance
const localDB = new LocalStorageDB();

// Mock Firebase functions for development
const mockAuth = {
    currentUser: null,
    
    async createUserWithEmailAndPassword(email, password) {
        const uid = 'user-' + Date.now();
        const userData = {
            uid,
            email,
            createdAt: new Date()
        };
        
        localDB.createUser(userData);
        this.currentUser = userData;
        
        return {
            user: userData
        };
    },
    
    async signInWithEmailAndPassword(email, password) {
        const user = localDB.findUserByEmail(email);
        if (!user) {
            throw new Error('User not found');
        }
        
        this.currentUser = user;
        return {
            user: user
        };
    },
    
    async signOut() {
        this.currentUser = null;
    },
    
    onAuthStateChanged(callback) {
        // Simulate auth state change
        setTimeout(() => {
            callback(this.currentUser);
        }, 100);
        
        // Return a unsubscribe function
        return () => {};
    }
};

// Mock Firestore functions
const mockFirestore = {
    collection(collectionName) {
        return {
            doc(id) {
                return {
                    async get() {
                        let data;
                        if (collectionName === 'vendors') {
                            data = localDB.findVendorById(id);
                        } else if (collectionName === 'customers') {
                            data = localDB.findUserById(id);
                        } else if (collectionName === 'admins') {
                            data = localDB.findAdminById(id);
                        }
                        
                        return {
                            exists: !!data,
                            data: () => data
                        };
                    },
                    
                    async set(data) {
                        if (collectionName === 'vendors') {
                            localDB.createVendor({...data, uid: id});
                        }
                        // Add other collections as needed
                    }
                };
            }
        };
    }
};

// Export for use in other files
window.localDB = localDB;
window.mockAuth = mockAuth;
window.mockFirestore = mockFirestore;
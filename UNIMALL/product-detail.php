<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - MultiVendor Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #ff6b35;
            --secondary: #2c3e50;
            --accent: #00a8cc;
            --light: #f8f9fa;
            --dark: #2d3436;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
            --text: #2d3436;
            --shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f9f9f9;
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background: white;
            color: var(--dark);
            padding: 15px 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo i {
            margin-right: 10px;
            color: var(--primary);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 25px;
            position: relative;
        }

        nav ul li a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            position: relative;
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--primary);
            transition: var(--transition);
        }

        nav ul li a:hover:after {
            width: 100%;
        }

        nav ul li a:hover {
            color: var(--primary);
        }

        nav ul li a i {
            margin-right: 5px;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #ff8c42);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.8), rgba(0, 168, 204, 0.8)), url('https://images.unsplash.com/photo-1556906781-2f0520405b71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .page-header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,224C672,235,768,181,864,181.3C960,181,1056,235,1152,229.3C1248,224,1344,160,1392,128L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .page-header-content {
            position: relative;
            z-index: 1;
        }

        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            list-style: none;
            font-size: 1.1rem;
        }

        .breadcrumb li {
            margin: 0 10px;
        }

        .breadcrumb li a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb li:after {
            content: '/';
            margin-left: 10px;
            color: rgba(255, 255, 255, 0.7);
        }

        .breadcrumb li:last-child:after {
            content: '';
            margin-left: 0;
        }

        /* Products Section */
        .products-container {
            display: flex;
            gap: 30px;
            margin-bottom: 70px;
        }

        /* Filters Sidebar */
        .filters-sidebar {
            width: 280px;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            align-self: flex-start;
            position: sticky;
            top: 100px;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .filter-header h2 {
            font-size: 1.5rem;
            color: var(--secondary);
        }

        .clear-filters {
            color: var(--primary);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .filter-group {
            margin-bottom: 25px;
        }

        .filter-group h3 {
            margin-bottom: 15px;
            color: var(--secondary);
            font-size: 1.1rem;
        }

        .filter-options {
            list-style: none;
        }

        .filter-options li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }

        .filter-options input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .filter-options label {
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-options label:hover {
            color: var(--primary);
        }

        .price-range {
            width: 100%;
            height: 5px;
            -webkit-appearance: none;
            background: #ddd;
            border-radius: 5px;
            outline: none;
            margin: 15px 0;
        }

        .price-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary);
            cursor: pointer;
        }

        .price-values {
            display: flex;
            justify-content: space-between;
            color: #777;
            font-size: 0.9rem;
        }

        /* Products Grid */
        .products-grid-container {
            flex: 1;
        }

        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        .results-count {
            font-size: 1.1rem;
            color: #777;
        }

        .sort-options {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sort-options select {
            padding: 10px 15px;
            border-radius: 30px;
            border: 1px solid #ddd;
            background: white;
            cursor: pointer;
        }

        .view-options {
            display: flex;
            gap: 10px;
        }

        .view-options button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .view-options button.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .view-options button:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.6s ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }
        .product-card:nth-child(7) { animation-delay: 0.7s; }
        .product-card:nth-child(8) { animation-delay: 0.8s; }

        .product-card:hover {
            transform: translateY(-8px) rotate(1deg);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 200px;
            background: linear-gradient(45deg, #e0e0e0, #f5f5f5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bbb;
            font-size: 4rem;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .product-img:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.05));
        }

        .product-info {
            padding: 25px;
        }

        .product-info h3 {
            margin-bottom: 12px;
            color: var(--secondary);
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .product-info h3:hover {
            color: var(--primary);
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            margin: 12px 0;
        }

        .product-vendor {
            color: #777;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .product-rating {
            color: var(--warning);
            margin-bottom: 20px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .add-to-cart {
            background: linear-gradient(135deg, var(--primary), #ff8c42);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            cursor: pointer;
            flex: 1;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-to-cart:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .see-details {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .see-details:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--success);
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            gap: 10px;
        }

        .pagination button {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .pagination button.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination button:hover:not(.active) {
            background: #f5f5f5;
        }

        /* Product Detail Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            padding: 20px;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .product-modal {
            background: white;
            border-radius: 12px;
            width: 100%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            display: flex;
            opacity: 0;
            transform: scale(0.9);
            transition: var(--transition);
        }

        .modal-overlay.active .product-modal {
            opacity: 1;
            transform: scale(1);
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .modal-close:hover {
            background: var(--primary);
            color: white;
        }

        .modal-gallery {
            flex: 1;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 12px 0 0 12px;
        }

        .modal-main-image {
            background: linear-gradient(45deg, #e0e0e0, #f5f5f5);
            border-radius: 8px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 5rem;
            color: #bbb;
        }

        .modal-thumbnails {
            display: flex;
            gap: 10px;
        }

        .modal-thumbnail {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.5rem;
            color: #999;
        }

        .modal-thumbnail:hover {
            transform: translateY(-5px);
        }

        .modal-info {
            flex: 1;
            padding: 30px;
            position: relative;
        }

        .modal-title {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--secondary);
        }

        .modal-meta {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .modal-rating {
            display: flex;
            align-items: center;
            color: var(--warning);
            font-weight: 500;
        }

        .modal-reviews {
            color: #777;
            margin-left: 10px;
        }

        .modal-vendor {
            color: #777;
        }

        .modal-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin: 20px 0;
        }

        .modal-description {
            margin-bottom: 25px;
            line-height: 1.8;
            color: #555;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .modal-quantity {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 30px;
            overflow: hidden;
        }

        .modal-quantity-btn {
            width: 45px;
            height: 45px;
            border: none;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.2rem;
        }

        .modal-quantity-btn:hover {
            background: var(--primary);
            color: white;
        }

        .modal-quantity-input {
            width: 60px;
            height: 45px;
            text-align: center;
            border: none;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .modal-add-to-cart {
            padding: 0 30px;
            background: linear-gradient(135deg, var(--primary), #ff8c42);
            color: white;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-add-to-cart:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .modal-wishlist {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .modal-wishlist:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .modal-features {
            margin-top: 25px;
        }

        .modal-feature {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--secondary), #1a2530);
            color: white;
            padding: 70px 0 30px;
            margin-top: 70px;
            position: relative;
        }

        footer:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ff6b35" fill-opacity="0.1" d="M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,224C672,235,768,181,864,181.3C960,181,1056,235,1152,229.3C1248,224,1344,160,1392,128L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat top;
            background-size: cover;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .footer-column h3 {
            margin-bottom: 25px;
            font-size: 1.4rem;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3:after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background: var(--primary);
            bottom: 0;
            left: 0;
            border-radius: 2px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 12px;
        }

        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
        }

        .footer-column ul li a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #ccc;
            position: relative;
            z-index: 1;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .products-container {
                flex-direction: column;
            }
            
            .filters-sidebar {
                width: 100%;
                position: static;
                margin-bottom: 30px;
            }
            
            .product-modal {
                flex-direction: column;
                max-height: 95vh;
            }
            
            .modal-gallery {
                border-radius: 12px 12px 0 0;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin: 20px 0;
                justify-content: center;
                flex-wrap: wrap;
            }

            nav ul li {
                margin: 8px 15px;
            }

            .page-header h1 {
                font-size: 2.5rem;
            }

            .products-header {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }
            
            .sort-options {
                width: 100%;
                justify-content: space-between;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .modal-actions {
                justify-content: center;
            }
            
            .modal-thumbnails {
                justify-content: center;
            }
        }

        /* Animation utilities */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="index.html" class="logo">
                    <i class="fas fa-store"></i>MultiVendor
                </a>
                <nav>
                    <ul>
                        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="products.html" class="active"><i class="fas fa-box"></i> Products</a></li>
                        <li><a href="#"><i class="fas fa-user-tie"></i> Vendor</a></li>
                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                    </ul>
                </nav>
                <div class="auth-buttons">
                    <a href="login.html" class="btn btn-outline">Login</a>
                    <a href="register.html" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container page-header-content">
            <h1>Our Products</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Products</li>
            </ul>
        </div>
    </section>

    <!-- Products Section -->
    <div class="container">
        <div class="products-container">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <div class="filter-header">
                    <h2>Filters</h2>
                    <button class="clear-filters">Clear All</button>
                </div>
                
                <div class="filter-group">
                    <h3>Categories</h3>
                    <ul class="filter-options">
                        <li>
                            <input type="checkbox" id="cat-electronics">
                            <label for="cat-electronics">Electronics</label>
                        </li>
                        <li>
                            <input type="checkbox" id="cat-fashion">
                            <label for="cat-fashion">Fashion</label>
                        </li>
                        <li>
                            <input type="checkbox" id="cat-home">
                            <label for="cat-home">Home & Kitchen</label>
                        </li>
                        <li>
                            <input type="checkbox" id="cat-beauty">
                            <label for="cat-beauty">Health & Beauty</label>
                        </li>
                    </ul>
                </div>
                
                <div class="filter-group">
                    <h3>Price Range</h3>
                    <input type="range" class="price-range" min="0" max="1000000" step="10000" value="500000">
                    <div class="price-values">
                        <span>₦0</span>
                        <span>₦1,000,000</span>
                    </div>
                </div>
                
                <div class="filter-group">
                    <h3>Brand</h3>
                    <ul class="filter-options">
                        <li>
                            <input type="checkbox" id="brand-samsung">
                            <label for="brand-samsung">Samsung</label>
                        </li>
                        <li>
                            <input type="checkbox" id="brand-apple">
                            <label for="brand-apple">Apple</label>
                        </li>
                        <li>
                            <input type="checkbox" id="brand-sony">
                            <label for="brand-sony">Sony</label>
                        </li>
                        <li>
                            <input type="checkbox" id="brand-lg">
                            <label for="brand-lg">LG</label>
                        </li>
                    </ul>
                </div>
                
                <div class="filter-group">
                    <h3>Rating</h3>
                    <ul class="filter-options">
                        <li>
                            <input type="checkbox" id="rating-5">
                            <label for="rating-5">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> & Up
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="rating-4">
                            <label for="rating-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> & Up
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="rating-3">
                            <label for="rating-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> & Up
                            </label>
                        </li>
                    </ul>
                </div>
            </aside>
            
            <!-- Products Grid -->
            <div class="products-grid-container">
                <div class="products-header">
                    <div class="results-count">Showing 12 of 128 products</div>
                    <div class="sort-options">
                        <span>Sort by:</span>
                        <select>
                            <option>Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Highest Rated</option>
                        </select>
                        <div class="view-options">
                            <button class="active"><i class="fas fa-th"></i></button>
                            <button><i class="fas fa-list"></i></button>
                        </div>
                    </div>
                </div>
                
                <div class="products-grid">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-badge">Sale</div>
                        <div class="product-img" data-product="1">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="1">Smartphone XYZ</h3>
                            <div class="product-price">₦ 185,000</div>
                            <div class="product-vendor">TechGadgets Inc.</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                (124)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="1"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-img" data-product="2">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="2">Ultrabook Pro</h3>
                            <div class="product-price">₦ 420,000</div>
                            <div class="product-vendor">CompTech</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                (87)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="2"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-img" data-product="3">
                            <i class="fas fa-headphones"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="3">Wireless Headphones</h3>
                            <div class="product-price">₦ 65,000</div>
                            <div class="product-vendor">AudioMasters</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                (215)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="3"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-img" data-product="4">
                            <i class="fas fa-watch"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="4">Smart Watch Series 5</h3>
                            <div class="product-price">₦ 95,000</div>
                            <div class="product-vendor">WearableTech</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                (153)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="4"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="product-card">
                        <div class="product-badge">Popular</div>
                        <div class="product-img" data-product="5">
                            <i class="fas fa-tablet-alt"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="5">Tablet Pro Max</h3>
                            <div class="product-price">₦ 150,000</div>
                            <div class="product-vendor">TechGadgets Inc.</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                (98)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="5"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 6 -->
                    <div class="product-card">
                        <div class="product-img" data-product="6">
                            <i class="fas fa-tv"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="6">Smart TV 55"</h3>
                            <div class="product-price">₦ 320,000</div>
                            <div class="product-vendor">VisualTech</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                (167)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="6"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 7 -->
                    <div class="product-card">
                        <div class="product-badge">Sale</div>
                        <div class="product-img" data-product="7">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="7">Digital Camera Pro</h3>
                            <div class="product-price">₦ 210,000</div>
                            <div class="product-vendor">PhotoMasters</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                (201)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="7"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 8 -->
                    <div class="product-card">
                        <div class="product-img" data-product="8">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <div class="product-info">
                            <h3 data-product="8">Gaming Console</h3>
                            <div class="product-price">₦ 280,000</div>
                            <div class="product-vendor">GameTech</div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                (132)
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button class="see-details" data-product="8"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    <button class="active">1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>5</button>
                    <button><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Detail Modal -->
    <div class="modal-overlay" id="productModal">
        <div class="product-modal">
            <div class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </div>
            
            <div class="modal-gallery">
                <div class="modal-main-image">
                    <i class="fas fa-mobile-alt" id="modalMainImage"></i>
                </div>
                <div class="modal-thumbnails">
                    <div class="modal-thumbnail active">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="modal-thumbnail">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="modal-thumbnail">
                        <i class="fas fa-images"></i>
                    </div>
                    <div class="modal-thumbnail">
                        <i class="fas fa-expand"></i>
                    </div>
                </div>
            </div>
            
            <div class="modal-info">
                <h2 class="modal-title" id="modalTitle">Product Title</h2>
                
                <div class="modal-meta">
                    <div class="modal-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="modal-reviews">(124 reviews)</span>
                    </div>
                    
                    <div class="modal-vendor">
                        Sold by: <a href="#" id="modalVendor">Vendor Name</a>
                    </div>
                    
                    <div class="product-stock" style="color: var(--success);">
                        <i class="fas fa-check-circle"></i> In Stock
                    </div>
                </div>
                
                <div class="modal-price" id="modalPrice">₦ 0</div>
                
                <div class="modal-description" id="modalDescription">
                    Product description will be loaded here...
                </div>
                
                <div class="modal-actions">
                    <div class="modal-quantity">
                        <button class="modal-quantity-btn">-</button>
                        <input type="text" class="modal-quantity-input" value="1">
                        <button class="modal-quantity-btn">+</button>
                    </div>
                    
                    <button class="modal-add-to-cart">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    
                    <button class="modal-wishlist">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                
                <div class="modal-features">
                    <div class="modal-feature">
                        <i class="fas fa-shield-alt" style="color: var(--accent);"></i> 1-year warranty included
                    </div>
                    <div class="modal-feature">
                        <i class="fas fa-truck" style="color: var(--accent);"></i> Free delivery within Lagos
                    </div>
                    <div class="modal-feature">
                        <i class="fas fa-undo" style="color: var(--accent);"></i> 30-day return policy
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>MultiVendor Store</h3>
                    <p>Your one-stop shop for all your needs. Quality products from trusted vendors.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="#">Vendor Dashboard</a></li>
                        <li><a href="cart.html">Shopping Cart</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for updates</p>
                    <form>
                        <input type="email" placeholder="Your email address" style="padding: 12px; width: 100%; margin-bottom: 15px; border-radius: 30px; border: none; background: rgba(255,255,255,0.1); color: white;">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 MultiVendor Store. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Product data - in a real application, this would come from a database
        const products = {
            1: {
                title: "Smartphone XYZ - 128GB, 6GB RAM",
                price: "₦ 185,000",
                vendor: "TechGadgets Inc.",
                rating: 4.5,
                reviews: 124,
                description: "Experience the next level of smartphone technology with the all-new Smartphone XYZ. Featuring a stunning 6.7-inch Super AMOLED display, powerful octa-core processor, and a triple camera system that captures professional-quality photos and videos.",
                image: "fa-mobile-alt"
            },
            2: {
                title: "Ultrabook Pro",
                price: "₦ 420,000",
                vendor: "CompTech",
                rating: 4,
                reviews: 87,
                description: "The Ultrabook Pro is designed for professionals who need power and portability. With a sleek aluminum body, vibrant display, and all-day battery life, it's the perfect companion for work and play.",
                image: "fa-laptop"
            },
            3: {
                title: "Wireless Headphones",
                price: "₦ 65,000",
                vendor: "AudioMasters",
                rating: 5,
                reviews: 215,
                description: "Immerse yourself in crystal-clear audio with our premium wireless headphones. Featuring active noise cancellation, 30-hour battery life, and comfortable over-ear design for extended listening sessions.",
                image: "fa-headphones"
            },
            4: {
                title: "Smart Watch Series 5",
                price: "₦ 95,000",
                vendor: "WearableTech",
                rating: 4.5,
                reviews: 153,
                description: "Stay connected and track your fitness with the Smart Watch Series 5. With heart rate monitoring, GPS, and smartphone notifications, it's the perfect accessory for your active lifestyle.",
                image: "fa-watch"
            },
            5: {
                title: "Tablet Pro Max",
                price: "₦ 150,000",
                vendor: "TechGadgets Inc.",
                rating: 4,
                reviews: 98,
                description: "The Tablet Pro Max combines power and versatility in a sleek package. With a stunning display, powerful processor, and support for stylus input, it's perfect for work and creativity.",
                image: "fa-tablet-alt"
            },
            6: {
                title: "Smart TV 55\"",
                price: "₦ 320,000",
                vendor: "VisualTech",
                rating: 4.5,
                reviews: 167,
                description: "Transform your living room with our stunning 55-inch Smart TV. Featuring 4K resolution, HDR support, and built-in streaming apps for the ultimate entertainment experience.",
                image: "fa-tv"
            },
            7: {
                title: "Digital Camera Pro",
                price: "₦ 210,000",
                vendor: "PhotoMasters",
                rating: 5,
                reviews: 201,
                description: "Capture life's moments in stunning detail with the Digital Camera Pro. With a high-resolution sensor, advanced autofocus system, and 4K video recording, it's perfect for photographers of all levels.",
                image: "fa-camera"
            },
            8: {
                title: "Gaming Console",
                price: "₦ 280,000",
                vendor: "GameTech",
                rating: 4,
                reviews: 132,
                description: "Experience next-generation gaming with our powerful gaming console. With stunning graphics, fast loading times, and a vast library of games, it's the ultimate entertainment system.",
                image: "fa-gamepad"
            }
        };

        // DOM elements
        const modal = document.getElementById('productModal');
        const closeModal = document.getElementById('closeModal');
        const seeDetailsButtons = document.querySelectorAll('.see-details');
        const productImages = document.querySelectorAll('.product-img');
        const productTitles = document.querySelectorAll('.product-info h3');

        // Modal elements
        const modalTitle = document.getElementById('modalTitle');
        const modalPrice = document.getElementById('modalPrice');
        const modalVendor = document.getElementById('modalVendor');
        const modalDescription = document.getElementById('modalDescription');
        const modalMainImage = document.getElementById('modalMainImage');

        // Open modal function
        function openModal(productId) {
            const product = products[productId];
            if (product) {
                modalTitle.textContent = product.title;
                modalPrice.textContent = product.price;
                modalVendor.textContent = product.vendor;
                modalDescription.textContent = product.description;
                modalMainImage.className = `fas ${product.image}`;
                
                modal.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }
        }

        // Close modal function
        function closeModalFunc() {
            modal.classList.remove('active');
            document.body.style.overflow = ''; // Enable scrolling
        }

        // Event listeners
        seeDetailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product');
                openModal(productId);
            });
        });

        productImages.forEach(image => {
            image.addEventListener('click', function() {
                const productId = this.getAttribute('data-product');
                openModal(productId);
            });
        });

        productTitles.forEach(title => {
            title.addEventListener('click', function() {
                const productId = this.getAttribute('data-product');
                openModal(productId);
            });
        });

        closeModal.addEventListener('click', closeModalFunc);

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModalFunc();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModalFunc();
            }
        });

        // Quantity buttons in modal
        const quantityBtns = document.querySelectorAll('.modal-quantity-btn');
        const quantityInput = document.querySelector('.modal-quantity-input');
        
        quantityBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                
                if (this.textContent === '+') {
                    value++;
                } else if (this.textContent === '-' && value > 1) {
                    value--;
                }
                
                quantityInput.value = value;
            });
        });

        // Add to cart functionality in modal
        const modalAddToCart = document.querySelector('.modal-add-to-cart');
        
        modalAddToCart.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-check"></i> Added to Cart';
            this.style.background = 'var(--success)';
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-shopping-cart"></i> Add to Cart';
                this.style.background = '';
            }, 2000);
        });

        // Wishlist button in modal
        const modalWishlist = document.querySelector('.modal-wishlist');
        
        modalWishlist.addEventListener('click', function() {
            const icon = this.querySelector('i');
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.style.background = 'var(--danger)';
                this.style.borderColor = 'var(--danger)';
                this.style.color = 'white';
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.style.background = '';
                this.style.borderColor = '#ddd';
                this.style.color = '';
            }
        });

        // Thumbnail selection in modal
        const modalThumbnails = document.querySelectorAll('.modal-thumbnail');
        
        modalThumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                modalThumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // In a real application, you would change the main image source
                // For this demo, we'll just change the icon
                const iconIndex = Array.from(modalThumbnails).indexOf(this);
                const icons = ['fa-mobile-alt', 'fa-camera', 'fa-images', 'fa-expand'];
                modalMainImage.className = `fas ${icons[iconIndex]}`;
            });
        });

        // Add to cart functionality in product cards
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                this.innerHTML = '<i class="fas fa-check"></i> Added';
                this.style.background = 'var(--success)';
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-shopping-cart"></i> Add to Cart';
                    this.style.background = '';
                }, 2000);
            });
        });

        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            animatedElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>
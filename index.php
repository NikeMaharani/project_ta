<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaharaniShop</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }
        .hero {
            background: url('https://images.unsplash.com/photo-1533577116850-9cc66cad8a9b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80') 
                        center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            min-height: 100vh;
        }
        .hero-content {
            max-width: 600px;
            animation: fadeIn 2s;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
        }
        .btn-login {
            background-color: #ff5e62;
            border: none;
            font-weight: bold;
            color: #fff;
            padding: 10px 20px;
            margin-right: 15px;
            box-shadow: 0 4px 8px rgba(255, 94, 98, 0.5);
        }
        .btn-register {
            background-color: #4895ef;
            border: none;
            font-weight: bold;
            color: #fff;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(72, 149, 239, 0.5);
        }
        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
        }
        /* Keyframe for animation */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>

<!-- Hero Section with Login and Register Buttons -->
<section class="hero">
    <div class="hero-content">
        <h1>MaharaniShop</h1>
        <p>Your ultimate destination for trendy and affordable fashion.</p>
        <div>
            <a href="login.php" class="btn btn-login btn-lg">Login</a>
            <a href="register.php" class="btn btn-register btn-lg">Register</a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

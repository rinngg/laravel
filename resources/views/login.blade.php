<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="{{ route('login.post') }}" method="POST"> <!-- Updated route name -->
            @csrf
            <div class="textbox">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="textbox">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <p>Career Training College</p>
            <p>© All Rights Reserved by Rin Nguyen - 2024</p>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" class="social-icon">
                    <img src="{{ asset('images/facebook-brands-solid.svg') }}" alt="Facebook">
                </a>
                <a href="https://twitter.com" target="_blank" class="social-icon">
                    <img src="{{ asset('images/x-twitter-brands-solid.svg') }}" alt="Twitter">
                </a>
                <a href="https://instagram.com" target="_blank" class="social-icon">
                    <img src="{{ asset('images/instagram-brands-solid.svg') }}" alt="Instagram">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
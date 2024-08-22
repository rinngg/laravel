<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/about.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-content">
            <a href="{{ route('home') }}" class="navbar-brand">The Career Center</a>
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('events') }}">Events</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to The Career Center! Our mission is to empower individuals with the skills and knowledge they need to achieve their professional goals. We offer a wide range of services, including career counseling, workshops, and networking opportunities.</p>
        <p>At The Career Center, we believe in a personalized approach to career development. Our team of experienced professionals is dedicated to helping you navigate the complex world of work, whether you are just starting out or looking to make a career change.</p>
        <p>We pride ourselves on our commitment to inclusivity and diversity. We work with individuals from all backgrounds and strive to create a supportive environment where everyone can thrive.</p>
        <p>Thank you for choosing The Career Center as your partner in professional growth. We look forward to helping you achieve your career aspirations.</p>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <p>The Career Center</p>
            <p>© All Right Reserved by Rin Nguyen - 2024</p>
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
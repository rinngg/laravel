<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <script>
        function submitLogoutForm(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById('logout-form').submit(); // Submit the form
        }
    </script>
</head>
<body>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-content">
            <a href="{{ url('/home') }}" class="navbar-brand">Career Training College</a>
            <ul class="navbar-menu">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/events') }}">Events</a></li>
                @if (Auth::check() && Auth::user()->isAdmin == 1)
                    <li><a href="{{ route('users.create') }}">Create User</a></li>
                @endif
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <!-- Add Logout Link -->
                @if (Auth::check())
                    <li>
                        <a href="#" onclick="submitLogoutForm(event);" class="btn-custom btn-logout">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="main-content">
        <div class="contact-map-container">
            <div class="contact-form">
                <h2>Contact Us</h2>
                    <div class="textbox">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="textbox">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="textbox">
                        <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3385.4949633199085!2d115.86142359999998!3d-31.947466299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bb08f0ad263d%3A0xa923255c968656bd!2sPerth%20Jobs%20and%20Skills%20Centre!5e0!3m2!1sen!2sau!4v1722583305782!5m2!1sen!2sau" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>Career Training College</p>
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
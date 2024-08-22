<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/events.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-content">
            <a href="{{ route('home') }}" class="navbar-brand">The Career Center</a>
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('userscreate') }}">Create User</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('events') }}">Events</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Upcoming Events</h1>

        <table class="events-table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Career Fair 2024</td>
                    <td>April 15, 2024</td>
                    <td>Main Auditorium</td>
                    <td>Join us for our annual Career Fair where top employers will be recruiting for various positions. A great opportunity to network and explore new career paths.</td>
                </tr>
                <tr>
                    <td>Resume Workshop</td>
                    <td>May 10, 2024</td>
                    <td>Room 204</td>
                    <td>Learn how to craft a compelling resume that stands out. Our experts will provide tips and feedback to help you showcase your skills and experience.</td>
                </tr>
                <tr>
                    <td>Interview Skills Seminar</td>
                    <td>June 22, 2024</td>
                    <td>Conference Hall B</td>
                    <td>Master the art of interviewing with our interactive seminar. Gain confidence and learn how to answer tough questions to impress potential employers.</td>
                </tr>
                <tr>
                    <td>LinkedIn Profile Optimization</td>
                    <td>July 5, 2024</td>
                    <td>Room 305</td>
                    <td>Optimize your LinkedIn profile to attract recruiters and build your professional network. Get personalized advice and practical tips.</td>
                </tr>
                <tr>
                    <td>Networking Evening</td>
                    <td>August 20, 2024</td>
                    <td>Central Courtyard</td>
                    <td>Meet industry professionals and fellow job seekers at our Networking Evening. Exchange ideas, share experiences, and make valuable connections.</td>
                </tr>
            </tbody>
        </table>
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
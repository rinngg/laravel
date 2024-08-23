<!DOCTYPE html>
<html>
<head>
    <title>Career Training College</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <script>
        function submitLogoutForm(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById('logout-form').submit(); // Submit the form
        }
    </script>
</head>
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
                        <a href="#" onclick="submitLogoutForm(event);" class="log-out">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome to The Career Training College</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Professional Summary</th>
                @if (Auth::check() && Auth::user()->isAdmin == 1)
                    <th>Edit/Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->professional_summary }}</td>
                    @if (Auth::check() && Auth::user()->isAdmin == 1)
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn-custom btn-edit btn-sm">Edit</a>

                            <!-- Delete Button Form -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-custom btn-delete btn-sm"
                                    onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="space"></div>
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

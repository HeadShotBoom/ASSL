<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
    <link rel="stylesheet" href="{{ URL::asset('css/foundation.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css" />
    <script src="{{ URL::asset('js/vendor/modernizr.js') }}"></script>
    <script src="{{ URL::asset('js/vendor/datetimepicker.js') }}"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="{{ action('GigController@index') }}">Total Gig</a></h1>
        </li> <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a>
        </li>
    </ul>
    <section class="top-bar-section"> <!-- Right Nav Section -->
        <ul class="right">
            <li class="active">
                @if(Auth::check())
                <a href="{{ action('HomeController@logout') }}">Log Out</a>
                @else
                <a href="{{ action('HomeController@login') }}" >Log In</a>
                @endif
            </li>
            <li class="has-dropdown">
                <a href="#">NAVIGATION PLACEHOLDER</a>
                <ul class="dropdown">
                    <li><a href="#">First link in dropdown</a></li>
                    <li class="active">
                        <a href="#">Active link in dropdown</a>
                    </li>
                </ul>
            </li>
        </ul> <!-- Left Nav Section -->
        <ul class="left">
            <li><a href="#">NAVIGATION PLACEHOLDER</a></li>
        </ul>
    </section>
</nav>

@yield('content')

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage BlOg Website</title>
    <!-- custom style sheet -->
    <link rel="stylesheet" href="./style.css">
    <!-- Icon scout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONTS(MONTSERIT ) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign In</h2>
            @if (Session::has('success'))
                <div class="alert__massage success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert__massage error">
                    <p>{{ Session::get('fail') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert__massage success">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <p>{{ $error }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user_login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="signin_username" type="text" placeholder="Username or Email"
                    value="{{ old('signin_username') }}">
                <input name="signin_password" type="password" placeholder="Password">
                <button type="submit" class="btn">Sign In</button>
                <small>Don't have an account? <a href="{{ route('user_signup') }}">Register</a></small>
            </form>
        </div>
    </section>
</body>

</html>

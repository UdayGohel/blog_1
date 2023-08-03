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
            <h2>Sign UP</h2>
            @if ($errors->any())
                <div class="alert__massage error">
                    {{-- <p>This is an error massage</p> --}}
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <p>{{ $error }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user_register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="firstname" type="text" placeholder="First Name" value="{{ old('firstname') }}">
                <input name="lastname" type="text" placeholder="Last Name" value="{{ old('lastname') }}">
                <input name="username" type="text" placeholder="Username" value="{{ old('username') }}">
                <input name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                <input name="password" type="password" placeholder="Create Password">
                <input name="password_confirmation" type="password" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar_src" id="avatar">
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="{{ route('user_signin') }}">Sign In</a></small>
            </form>
        </div>
    </section>
</body>

</html>

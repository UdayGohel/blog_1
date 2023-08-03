<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage BlOg Website</title>
    <!-- custom style sheet -->
    <link rel="stylesheet" href="/style.css">
    <!-- Icon scout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONTS(MONTSERIT ) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="{{ route('user_home') }}" class="nav__logo">Fill Free to Read</a>
            <ul class="nav__items">
                <li><a href="{{ route('user_blog') }}">Blog</a></li>
                <li><a href="{{ route('about_us') }}">About</a></li>
                <li><a href="{{ route('service') }}">Services</a></li>
                <li><a href="{{ route('contact_us') }}">Contact</a></li>
                {{-- <li><a href="signin.html">Sign in</a></li> --}}
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="{{ asset('storage/images/' . $s->avatar_src) }}" alt="">
                    </div>
                    <ul>
                        <li><a href="{{ route('admin_dashborad') }}">Dashboard</a></li>
                        <li><a href="{{ route('user_signout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav_btn"><i class="uil uil-align-center"></i></button>
            <button id="close__nav_btn"><i class="uil uil-times"></i></button>
        </div>
    </nav>
    <!---------------------------------- End of nav------------------- -->


    <section class="form__section">
        <div class="container form__section-container">
            <h2>Add User</h2>
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
            <form action="{{ route('admin_user_register') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input name="firstname" type="text" placeholder="First Name">
                <input name="lastname" type="text" placeholder="Last Name">
                <input name="username" type="text" placeholder="Username">
                <input name="email" type="email" placeholder="Email">
                <input name="password" type="password" placeholder="Create Password">
                <input name="password_confirmation" type="password" placeholder="Confirm Password">
                <select name="user_name">
                    <option value="0">Reader</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input name="avatar_src" type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

    <!--===================END OF POST ============================ -->
    <footer>
        <div class="footer__socials">
            <a href="https://github.com/UdayGohel" target="_blank"><i class="uil uil-github"></i></a>
            <a href="https://twitter.com/Uday_Gohel_" target="_blank"><i class="uil uil-twitter"></i></a>
            <a href="https://www.linkedin.com/in/uday-gohel-62817122a/" target="_blank"><i
                    class="uil uil-linkedin"></i></a>
            <a href="https://github.com/UdayGohel" target="_blank"><i class="uil uil-instagram"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">Art</a></li>
                    <li><a href="">Science & Tech</a></li>
                    <li><a href="">Inspirational Life</a></li>
                    <li><a href="">Food</a></li>
                    <li><a href="">Travel</a></li>
                    <li><a href="">Wild Life</a></li>

                </ul>
            </article>
            <article>
                <h4>BLog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Popular<a></li>
                    <li><a href="">Categories</a></li>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Support</a></li>
                    <li><a href="">Call Numbers</a></li>
                    <li><a href="">Emalis</a></li>
                    <li><a href="">Social Support</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">

            <small>Copyright &copy; 2022 Blog Editor</small>
        </div>
    </footer>

    <script src="/main.js"></script>
</body>

</html>

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
                        <img src="./images/avatar1.jpg" alt="">
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
            <h2>Edit User</h2>
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
            <form action="{{ route('admin_user_update', ['id' => $user->user_id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input name="firstname" value="{{ $user->firstname }}" type="text" placeholder="First Name">
                <input name="lastname" value="{{ $user->lastname }}" type="text" placeholder="Last Name">
                <select name="edit_admin">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <button type="submit" class="btn">Update User</button>
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

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
                        <img src="{{ asset('storage/images/' . $data->avatar_src) }}" alt="Profile Pic">
                    </div>
                    <ul>
                        @if ($data->is_admin === '1')
                            <li><a href="{{ route('admin_dashborad') }}">Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('user_signout') }}">Logout</a></li>

                    </ul>
                </li>
            </ul>
            <button id="open__nav_btn"><i class="uil uil-align-center"></i></button>
            <button id="close__nav_btn"><i class="uil uil-times"></i></button>
        </div>
    </nav>
    <!---------------------------------- End of nav------------------- -->

    <section class="featured">
        <div class="container featured__container">
            <div class="post__thumbail">
                <img src="{{ asset('storage/images/thumbnail/' . $c->thumbnail) }}" alt="">
                {{-- <img src="" alt="Nothing"> --}}
            </div>
            <div class="post__info">
                <a href="{{ route('user_category_post', ['id' => $c->id]) }}"
                    class="category__button">{{ $c->title }}</a>
                <h2 class="post__title"><a
                        href="{{ route('user_single_post', ['no' => $c->post_id]) }}">{{ $c->post_title }}</a></h2>
                <p class="post__body">{{ Str::limit($c->body, 250, '...') }}
                </p>
                <div class="post__author">
                    <div class="post__author__avatar">
                        <img src="{{ asset('storage/images/' . $c->avatar_src) }}">
                    </div>
                    <div class="post__author-info">
                        <h5>By: {{ $c->firstname }}</h5>
                        <small>{{ $c->updated_at }}</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- --------------------------------END OF FEATURED POST   --------------------------------------- -->
    <section class="posts">
        <div class="container posts__container">
            @foreach ($b as $data)
                @if ($data->is_featured === '0')
                    @if ($data->deleted_at === null)
                        <article class="post">
                            <div class="post__thumbail">
                                <img src="{{ asset('storage/images/thumbnail/' . $data->thumbnail) }}" alt="">
                            </div>
                            <div class="post__info">
                                <a href="{{ route('user_category_post', ['id' => $data->id]) }}"
                                    class="category__button">{{ $data->title }}</a>
                                <h3 class="post__title"><a
                                        href="{{ route('user_single_post', ['no' => $data->post_id]) }}">{{ $data->post_title }}</a>
                                </h3>
                                <p class="post__body">{{ Str::limit($data->body, 50, '...') }}</p>
                                <div class="post__author">
                                    <div class="post__author__avatar">
                                        <img src="{{ asset('storage/images/' . $data->avatar_src) }}" alt="">
                                    </div>
                                    <div class="post__author-info">
                                        <h5>By: {{ $data->firstname }}</h5>
                                        <small>{{ $data->updated_at }}</small>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endif
                @endif
            @endforeach
        </div>
    </section>
    <!-- --------------------------------END OF POSTS   --------------------------------------- -->
    <section class="category__buttons">
        <div class="container category__buttons-container">
            <a href="" class="category__button">Category</a>
            <a href="" class="category__button">Wild Life</a>
            <a href="" class="category__button">Science & Tech</a>
            <a href="" class="category__button">Inspirational Life</a>
            <a href="" class="category__button">Food</a>
            <a href="" class="category__button">Travel</a>
        </div>
    </section>
    <!-- --------------------------------END OF category buttons   --------------------------------------- -->


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

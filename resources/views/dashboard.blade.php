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
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

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
                        @if ($s->is_admin === '1')
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

    <section class="dashboard">
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
        <div class="container dashboard__container">
            <button class="sidebar__toggle" id="show__sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
            <button class="sidebar__toggle" id="hide__sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
            <aside>
                <ul>
                    <li><a href="{{ route('admin_Add_post') }}"><i class="uil uil-pen"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li><a href="{{ route('admin_dashborad') }}" class="active"><i class="uil uil-postcard"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <li><a href="{{ route('admin_AddUser') }}"><i class="uil uil-user-plus"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li><a href="{{ route('admin_manageUser') }}"><i class="uil uil-users-alt"></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                    <li><a href="{{ route('admin_Addcategory') }}"><i class="uil uil-edit"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li><a href="{{ route('admin_manage_category') }}"><i class="uil uil-list-ul"></i>
                            <h5>Manage Categories</h5>
                        </a>
                    </li>
                </ul>
            </aside>
            <main>
                <h2>Manage Post</h2>
                <table id="usertable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($b as $post)
                            @if ($post->deleted_at === null)
                                <tr>
                                    <td>{{ $post->post_title }}</td>
                                    <td>{{ $post->firstname }}</td>
                                    <td><a href="{{ route('admin_editpost', ['id' => $post->post_id]) }}"
                                            class="btn sm">Edit</a></td>
                                    <td><a href="{{ route('admin_deletepost', ['id' => $post->post_id]) }}"
                                            class="btn sm danger">Delete</a></td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </main>
        </div>
    </section>

    {{-- ===========================End OF Manage categories ================================= --}}
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
    <script>
        $(document).ready(function() {
            var table = $('#usertable').DataTable({
                lengthMenu: [
                    [2, 4, 7, -1],
                    [2, 4, 7, "All"]
                ],
                pageLength: 4
            });
        });
    </script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>

</html>

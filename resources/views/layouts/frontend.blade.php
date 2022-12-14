<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Artikel | CIRT</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Intro settings -->
        <style>
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 58px;
            }

            @media (max-width: 991px) {
                #intro {
                    /* Margin to fix overlapping fixed navbar */
                    margin-top: 45px;
                }
            }
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1751a5;">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" target="_blank" href=" {{ route('index') }}">
                    <img src=https://www.pens.ac.id/wp-content/uploads/2018/04/Logo-PENS-putih-e1522932523588.png
                        height="35" alt="" loading="lazy" style="margin-top: -3px; " />
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-white" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/#news" rel="nofollow">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/#about">About</a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Jumbotron -->

        <!-- Jumbotron -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->

    <main class="mt-4 mb-5">
        {{ $slot }}
    </main>
    <!--Main layout-->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color:  #1751a5;">
        <a class="text-white" href=" {{ route('index') }}">© 2022 Politeknik Elektronika Negeri Surabaya</a>
    </div>
    <!-- Copyright -->

    <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <!-- <script type="text/javascript" src="{{ asset('js/script.js') }}"></script> -->
</body>

</html>

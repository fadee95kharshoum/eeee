<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bondi</title>
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/bondi.css')}}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
    </head>

<body>

    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('front/imgs/logo.png') }}" alt="" width="150" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars">Valex</i>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#home">{{ __('home.Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#services">{{ __('home.Services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#cards">{{ __('home.Buy Card') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#footer">{{ __('home.About') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="#discount">{{ __('home.Contact') }}</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle p-2  " type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ LaravelLocalization::getCurrentLocale(); }}
                            </button>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                                    <li>
                                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">
                                            {{ $lang }}
                                        </a>
                                    </li>
                                @endforeach
                                </ul>

                        </div>
                    </li>
                </ul>
                <div class="search ps-3 pe-3 d-none d-lg-block">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                @guest
                    @if (Route::has('login'))
                        <button class="button"><a href="{{ route('login') }}">{{ __('Login') }}</a></button>
                    @endif
                @else
                    <li class="navbar-nav dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (Auth()->user()->type == 'Admin')
                                <a class="dropdown-item" href="{{ route('home') }}">{{ __('Dashbord') }}</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- start home -->
    <section class="home" id="home">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators ">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video class="video" autoplay loop muted>
                        <source src="{{ asset('backend/' . $video->path) }}" type="video/mp4" />
                    </video>
                    <div class="container">
                        <h3>{{ $video->name }}</h3>
                        <p>{{ $video->description }}</p>
                    </div>
                </div>
                @foreach ($images as $image)
                    <div class="carousel-item " style="background-image:url('{{ asset('backend/' . $image->path) }}')">
                        <div class="container">
                            <h3>{{ $image->name }}</h3>
                            <p>{{ $image->description }}</p>
                        </div>
                    </div>
                @endforeach
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('Previous') }}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('Next') }}</span>
                </button>
            </div>
        </div>
    </section>
    <!-- end home -->

    <div id="#services""></div>
    <!-- start features -->
    <section class="features" >
        <div class=" text-center pt-5 pb-5">
            <div class="container">
                <div class="main-title mt-5 mb-5 position-relative">
                    <i class="fa-solid fa-gears mb-4 fa-6x " style="color: var(--yellow-color);"></i>
                    <h2>{{ $headSecondSecion->name }}</h2>
                    <p class="text-black-50 text-uppercase">{{ $headSecondSecion->description }}</p>
                </div>
                <div class="row">
                    @foreach ($bodyOfSecondSection as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="feat">
                                <div class="icon-holder position-relative">
                                    <i class="fa-solid fa-{{ $item->path }} position-absolute bottom-0 number"></i>
                                    <i
                                        class="fa-solid fa-{{ $item->icon }} position-absolute bottom-0  icon fa-4x"></i>
                                </div>
                                <h4 class="mb-3 mt-3 text-uppercase">{{ $item->name }}</h4>
                                <p class="text-black-50 lh-lg">{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end features -->


    <!-- start section cards -->
    <section id="cards" class="cards_container">
        <h2>Services</h2>
        <main class="cards">
            @foreach ($cardsForSale as $card)
                <div class="one">
                    <div class="imgs">
                        <img src="{{ asset('backend/' . $card->path) }}" alt="#">
                    </div>
                    <h4>{{ $card->name }}</h4>
                    <p>{{ $card->description }}</p>
                    {{-- <h6>Price: <span>{{ $card->price }}</span></h6> --}}
                    <button class="button"><a href="{{ route('buy', $card->id) }}">Buy now</a></button>
                </div>
            @endforeach
        </main>
    </section>
    <!-- end section card -->


    <!-- start discount section       -->
    <section class="discount_section" id="discount">
        <header class="discount_section__header">
            <h2>{{ $discount->name }}</h2>
            <p>{{ $discount->description }}</p>
            <img src="{{ asset('backend/' . $discount->path) }}" alt="#" style="width: 50% " />
        </header>
        <main class="discount_section__main">
            <h2>Request A Discount</h2>
            <form class="discount_section__main__form" action="{{ route('storeMessage') }}" method="POST">
                @csrf
                <input type="text" name="name" required placeholder="Your Name" required>
                <input type="email" name="email" required placeholder="Your Email" required>
                <input type="tel" name="phone" placeholder="Your Phone" required>
                <input type="text" name="case" placeholder="Subject" required>
                <textarea name="subject" placeholder="Tell Us About Your Needs" required></textarea>
                <button type="submit">Send</button>
            </form>
        </main>
    </section>
    <!-- end discount section   -->



    <!-- start footer -->
    <div class="footer pt-5 pb-5 text-white-50 text-center text-md-start" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="info mb-5">
                        <img src="#" alt="" class="mb-4" width="150px">
                        <p class="mb-5">
                            Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur
                            sed,
                            convallis at tellus.
                        </p>
                        <div class="copyright">
                            Created By <span>Graphberry</span>
                            <div>&copy; 2022 - <span>Bondi Inc</span></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-2">
                    <div class="links">
                        <h5 class="text-light">Links</h5>
                        <ul class="list-unstyled lh-lg">
                            <li>Home</li>
                            <li>Our Services</li>
                            <li>Portfolio</li>
                            <li>Testimonials</li>
                            <li>Support</li>
                            <li>Terms and Condition</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="links">
                        <h5 class="text-light">About Us</h5>
                        <ul class="list-unstyled lh-lg">
                            <li>Sign In</li>
                            <li>Register</li>
                            <li>About Us</li>
                            <li>Blog</li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact">
                        <h5 class="text-light">Contact Us</h5>
                        <p class="lh-lg mt-3 mb-5">Get in touch with us via mail phone.We are waiting for your call or
                            message</p>
                        <a class="btn rounded-pill main-btn w-100" href="{{ url('/admin/login') }}">graphberry@gmail.com</a>

                        <ul class="d-flex mt-5 list-unstyled gap-3">
                            <li>
                                <a class="d-block text-light" href="#">
                                    <i class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"></i>
                                </a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="#">
                                    <i class="fa-brands fa-twitter fa-lg twitter rounded-circle p-2"></i>
                                </a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="#">
                                    <i class="fa-brands fa-linkedin fa-lg linkedin rounded-circle p-2"></i>
                                </a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="#">
                                    <i class="fa-brands fa-youtube fa-lg youtube rounded-circle p-2"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer  -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/all.min.js') }}"></script>
</body>

</html>

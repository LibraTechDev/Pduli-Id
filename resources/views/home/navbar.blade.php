<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target fixed-top"
    id="ftco-navbar">
    <div class="container">
        <img src="{{ asset('home/images/logohitam.png') }}" style="max-width: 80px;" alt="">
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
            data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><span>Home</span></a></li>
                <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="servicesDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span>Services</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <a class="dropdown-item" href="{{ url('/harapan') }}">Tembok Harapan</a>
                        <a class="dropdown-item" href="#services-section">Janji Temu</a>
                        <a class="dropdown-item" href="#service3">Konsul Online</a>
                    </div>
                </li>

                <li class="nav-item"><a href="#doctor-section" class="nav-link"><span>Psychologist</span></a></li>
                <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
                <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                <li class="nav-item"><a href="" class="nav-link"><span>Subscribe</span></a></li>

                <!-- User Dropdown Menu -->
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <p class="mb-0 d-block navbar-profile-name">Hai , {{ Auth::user()->name }}</p>
                                <i class="mdi mdi-menu-down d-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="/user/profile">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="{{ url('/riwayat') }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Riwayat Jadwal</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="/logout" class="dropdown-item preview-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Log out</p>
                                </div>
                            </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a href="/register" class="nav-link"><span>Sign Up</span></a></li>
                    <li class="nav-item"><a href="/login" class="nav-link"><span>Sign In</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

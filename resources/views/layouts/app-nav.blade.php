@php
    $admin = Auth::user()->role == 'admin';
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>B Scientific Instrument</title>
    <link rel="icon" type="image" href="{{ asset('images/official_logo1.png') }}" alt="favicon">
    <link href="{{ asset('assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav-scroll.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/flagiconcss/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

</head>

<body>
    <div id="app">
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="{{ asset('images/official_logo1.png') }}" class="logo-off" alt="logo">
                    <h6 class=" tx-uner-logo"><strong>B Scientific Instrument</strong></h6>
                </div>

                <ul class=" list-unstyled components text-secondary">
                    @if ($admin || Auth::user()->per_dash == 1)
                        <li>
                            <a href="{{ url('bsi/dashboard') }}"><i class="fas fa-tv "></i> Dashboard</a>
                        </li>
                    @endif
                    @if ($admin || Auth::user()->per_ven == 1)
                        <li>
                            <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle no-caret-down">
                                <i class="fas fa-fax"></i> Vending Machine <i
                                    class="fas fa-angle-right"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="uielementsmenu">
                                <li>
                                    <a href="{{ url('/vending_machines') }}"><i class="fas fa-angle-right"></i>
                                        Machine</a>
                                </li>
                                <li>
                                    <a href="{{ url('/slot') }}"><i class="fas fa-angle-right"></i>Add Slot</a>
                                </li>
                                {{-- <li>
                                <a href="{{ url('/location') }}"><i class="fas fa-angle-right"></i> Location</a>
                            </li> --}}
                            </ul>
                        </li>
                    @endif
                    @if ($admin || Auth::user()->per_pro == 1)
                        <li>
                            <a href="#pro" data-bs-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle no-caret-down">
                                <i class="fas fa-baby-carriage"></i> Product <i class="fas fa-angle-right"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="pro">
                                <li>
                                    <a href="{{ url('/products') }}"><i class="fas fa-angle-right"></i> Product
                                        List</a>
                                </li>
                                <li>
                                    <a href="{{ url('/productCategory') }}"><i class="fas fa-angle-right"></i>
                                        Categories</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if ($admin || Auth::user()->per_in == 1)
                        <li>
                            <a href="#inc" data-bs-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle no-caret-down">
                                <i class="fas fa-dollar-sign"></i> Income <i class="fas fa-angle-right"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="inc">
                                <li>
                                    <a href="{{ url('/incomelist') }}"><i class="fas fa-angle-right"></i> Income
                                        List</a>
                                </li>
                                <li>
                                    <a href="{{ url('/incomecategory') }}"><i class="fas fa-angle-right"></i>
                                        Income Categories</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if ($admin || Auth::user()->per_inv == 1)
                        <li>
                            <a href="{{ url('/inventory') }}"><i class="fas fa-store-alt"></i> Inventory </a>
                        </li>
                    @endif
                    @if ($admin || Auth::user()->per_rep == 1)
                        <li>
                            <a href="#sale" data-bs-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle no-caret-down">
                                <i class="fas fas fa-file-signature"></i>
                                Report <i class="fas fa-angle-right"></i><i class="fas fa-regular fa-note-sticky"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="sale">
                                <li>
                                    <a href="{{ url('/sale-out') }}"><i class="fas fa-angle-right"></i> Sale Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="#exp" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle no-caret-down">
                            <i class="fas fas fa-hand-holding-usd"></i> Expense <i class="fas fa-angle-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="exp">
                            <li>
                                <a href="{{ url('/expense-list') }}"><i class="fas fa-angle-right"></i> Expense List
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/expense-cat') }}"><i class="fas fa-angle-right"></i>
                                    Expense Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#supp" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle no-caret-down">
                            <i class="fas fa-laptop-house"></i> Stock Information  <i class="fas fa-angle-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="supp">
                            <li>
                                <a href="{{ url('/stock-list') }}"><i class="fas fa-angle-right"></i> Stock List</a>
                            </li>
                            <li>
                                <a href="{{ url('/warehouse') }}"><i class="fas fa-angle-right"></i>Warehouse</a>
                            </li>
                            <li>
                                <a href="{{ url('/supp') }}"><i class="fas fa-angle-right"></i>Supplier</a>
                            </li>
                        </ul>
                    </li>
                    @if ($admin)
                        <li>
                            <a href="#set" data-bs-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle no-caret-down"><i class="fas fa-cog"></i> Settings <i
                                    class="fas fa-angle-right"></i></a>
                            <ul class="collapse list-unstyled" id="set">
                                <li>
                                    <a href="/company-info"><i class="fas fa-angle-right"></i> Company Information</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-angle-right"></i> Price</a>
                                </li>

                                <li>
                                    <a href="{{ url('/user') }}"><i class="fas fa-angle-right"></i> Users</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
            <div id="body" class="active">
                <nav class="navbar navbar-expand-lg navbar-white bg-white">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-bars"></i><span></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav  ms-auto ">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        @if (Auth::user()->profile_picture)
                                            <img src="{{ asset('path_to_user_images/' . Auth::user()->prof_img) }}"
                                                alt="Profile Picture" class="profile-image">
                                        @else
                                            <img src="{{ asset('images/defaul.jpg') }}" alt="logo"
                                                class="profile-image">
                                        @endif
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
                <main class="py-4 main">
                    @yield('content')
                </main>
            </div>
        </div>

        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/select-packer.js') }}"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js" defer></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js" defer>
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <link href="{{ asset('assets/vendor/datatables/datatables.min.css') }}" rel="stylesheet">

        <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>

        <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script>
    </div>
</body>

</html>

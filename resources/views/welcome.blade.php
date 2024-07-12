<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
 



    <header>
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('img/logo.svg')}}" alt="Bootstrap" width="80" height="44">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Games</a>
                        </li> 

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Sports
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link" href="#">Promotions</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link" href="#">About Us</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>

                    @if(Auth::check())
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="btn btn-success me-2" href="{{ route('dashboard') }}" role="button">Go To Dashboard</a>
                      </li>
                    </ul>

                    @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="btn btn-primary me-2" href="{{ route('login') }}" role="button">Login</a>
                      </li>
                      <li class="nav-item">
                          <a class="btn btn-secondary" href="{{route('userregister')}}" role="button">Register</a>
                      </li>
                  </ul>
                    @endif
                    

                </div>
            </div>
        </nav>
    </header>

        <!-- Display any success message -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Display any error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container main my-4">
        <div class="row">

          <div class="col-md-4 col-6 mb-4">
            <div class="card shadow-sm">
              <img src="{{asset('css/jhundi/img/icon.png')}}" class="card-img-top img-fluid" alt="Card image">
              <a href="{{route('jhundi')}}">
              <div class="card-body">
                <h5 class="card-title text-center">Langur Burja</h5>
              </div>
            </a>
            </div>
          </div>

          <div class="col-md-4 col-6 mb-4">
            <div class="card shadow-sm">
              <img src="https://img.freepik.com/free-photo/view-roulette-game-casino_23-2151007731.jpg?t=st=1719534739~exp=1719538339~hmac=79113e7953cc79a822ee8f954d447a853e33bb10b03281baa0d9cd286ee5cbe3&w=1380" class="card-img-top img-fluid" alt="Card image">
              <a href="{{route('jhundi')}}">
              <div class="card-body">
                <h5 class="card-title text-center">Card Title 2</h5>
              </div>
            </a>
            </div>
          </div>

          <div class="col-md-4 col-6 mb-4">
            <div class="card shadow-sm">
              <img src="https://images.unsplash.com/photo-1626775238053-4315516eedc9?q=80&w=1746&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top img-fluid" alt="Card image">
              <a href="{{route('jhundi')}}">
              <div class="card-body">
                <h5 class="card-title text-center">Card Title 3</h5>
              </div>
            </a>
            </div>
          </div>

          <div class="col-md-4 col-6 mb-4">
            <div class="card shadow-sm">
              <img src="https://img.freepik.com/free-vector/creative-casino-stuff-background_52683-73958.jpg?t=st=1719535996~exp=1719539596~hmac=d723a3f5b306676d2d03356a9178af3884e5e9d632f3d8c55c7a0076988c0c96&w=1380" class="card-img-top" alt="Card image">
              <a href="{{route('jhundi')}}">
              <div class="card-body">
                <h5 class="card-title text-center">Live Poker</h5>
              </div>
            </a>
            </div>
          </div>

          

          <div class="col-md-4 col-6 mb-4">
            <div class="card shadow-sm">
              <img src="https://images.unsplash.com/photo-1642056448416-b7dd0ed968cc?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Card image">
              <a href="{{route('jhundi')}}">
              <div class="card-body">
                <h5 class="card-title text-center">Cash Ludo</h5>
              </div>
            </a>
            </div>
          </div>

          <div class="col-md-4 col-6 mb-4">
            <div class="card shadow-sm">
              <img src="https://img.freepik.com/free-photo/adult-group-celebrating-friend-winning-roulette-roulette-table-casino-black-background_639032-2840.jpg?t=st=1719536083~exp=1719539683~hmac=a039e8a4fd9f2f5c71ad8f9b7d967f29fec70c4986850280c0a2ce5907759e91&w=1060" class="card-img-top" alt="Card image">
              <a href="{{route('jhundi')}}">
              <div class="card-body">
                <h5 class="card-title text-center">Rummy</h5>
              </div>
            </a>
            </div>
          </div>

        </div>
     </div>


    <!-- Sticky bottom bar -->
    <nav class="bottom-navigation sticky-bottom-bar">
        <ul class="bottom-navigation__list">
            <li class="bottom-navigation__item">
                <Button>
                    <span><i class="ri-trophy-fill"></i></span>
                    <span>Sports</span>
                </Button>
            </li>
            <li class="bottom-navigation__item">
                <Button>
                    <span><i class="ri-focus-2-line"></i></span>
                    <span>Casino</span>
                </Button>
            </li>
            <li class="bottom-navigation__item"> <Button>
                    <span><i class="ri-coupon-line"></i></span>
                    <span>Bet slip</span>
                </Button>
            </li>
            <li class="bottom-navigation__item">
                <Button>
                    <span><i class="ri-user-3-fill"></i></span>
                    <span>Log in</span>
                </Button>
            </li>
            <li class="bottom-navigation__item">
                <button class="toggle-button">
                    <Button>
                        <span><i class="ri-menu-line"></i></span>
                        <span>Menu</span>
                    </Button>
                </button>
            </li>
        </ul>
    </nav>


    <footer class="footer">
        <div class="container footer-content">
          <div class="footer-logo">
            Casino Royale
          </div>

          <div class="footer-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="footer-text">
            &copy; 2024 Casino Royale. All rights reserved.
          </div>
        </div>
      </footer>


      
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    </body>
    </html>
    
    
  </body>
  </html>
  {{-- 
  Mysql host name
  sql207.infinityfree.com
  mysql DB name
  if0_36799270_cashRoyal
  My Sql user name
  if0_36799270
  Mysql password
  J9LolPsGCS --}}





  {{-- MurLofN6bIg --}}
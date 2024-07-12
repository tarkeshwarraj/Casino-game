<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jhandi Burja</title>
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/jhundi/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/jhundi/dice.css')}}">
    
</head>



<body>
    <header>
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('img/logo.svg')}}" alt="Bootstrap" width="80" height="44">
                </a>

                <div class="collapse navbar-collapse" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-none d-md-flex">

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

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-warning me-2" href="" role="button">${{ $walletBalance }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="custom" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{route('logout')}}">LogOut</a></li>
                        </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    
    <div class="container">

        <h1 class="text-center">JHANDI MUNDA</h1>

        <div id="resultModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="resultMessage"></p>
            </div>
        </div>

        <div class="row paper">

            <div class="col-md-4">

                <h1 id="roll">ROCK & ROLL</h1>
              
                <div class="dice-container">
                        <div class="scene">
                            <div class="cube" id="cube1">
                                <div class="face front" data-value="1"><img src="{{asset('css/jhundi/img/1.jpg')}}" alt="1"></div>
                                <div class="face back" data-value="3"><img src="{{asset('css/jhundi/img/3.jpg')}}" alt="2"></div>
                                <div class="face right" data-value="6"><img src="{{asset('css/jhundi/img/6.jpg')}}" alt="3"></div>
                                <div class="face left" data-value="4"><img src="{{asset('css/jhundi/img/4.jpg')}}" alt="4"></div>
                                <div class="face top" data-value="5"><img src="{{asset('css/jhundi/img/5.jpg')}}" alt="5"></div>
                                <div class="face bottom" data-value="2"><img src="{{asset('css/jhundi/img/2.jpg')}}" alt="6"></div>
                            </div>
                        </div>
                        <!-- Repeat for other dice -->
                        <div class="scene">
                            <div class="cube" id="cube2">
                                <div class="face front" data-value="1"><img src="{{asset('css/jhundi/img/1.jpg')}}" alt="1"></div>
                                <div class="face back" data-value="3"><img src="{{asset('css/jhundi/img/3.jpg')}}" alt="2"></div>
                                <div class="face right" data-value="6"><img src="{{asset('css/jhundi/img/6.jpg')}}" alt="3"></div>
                                <div class="face left" data-value="4"><img src="{{asset('css/jhundi/img/4.jpg')}}" alt="4"></div>
                                <div class="face top" data-value="5"><img src="{{asset('css/jhundi/img/5.jpg')}}" alt="5"></div>
                                <div class="face bottom" data-value="2"><img src="{{asset('css/jhundi/img/2.jpg')}}" alt="6"></div>
                            </div>
                        </div>
                        <div class="scene">
                            <div class="cube" id="cube3">
                                <div class="face front" data-value="1"><img src="{{asset('css/jhundi/img/1.jpg')}}" alt="1"></div>
                                <div class="face back" data-value="3"><img src="{{asset('css/jhundi/img/3.jpg')}}" alt="2"></div>
                                <div class="face right" data-value="6"><img src="{{asset('css/jhundi/img/6.jpg')}}" alt="3"></div>
                                <div class="face left" data-value="4"><img src="{{asset('css/jhundi/img/4.jpg')}}" alt="4"></div>
                                <div class="face top" data-value="5"><img src="{{asset('css/jhundi/img/5.jpg')}}" alt="5"></div>
                                <div class="face bottom" data-value="2"><img src="{{asset('css/jhundi/img/2.jpg')}}" alt="6"></div>
                            </div>
                        </div>

                        <div class="scene">
                            <div class="cube" id="cube4">
                                <div class="face front" data-value="1"><img src="{{asset('css/jhundi/img/1.jpg')}}" alt="1"></div>
                                <div class="face back" data-value="3"><img src="{{asset('css/jhundi/img/3.jpg')}}" alt="2"></div>
                                <div class="face right" data-value="6"><img src="{{asset('css/jhundi/img/6.jpg')}}" alt="3"></div>
                                <div class="face left" data-value="4"><img src="{{asset('css/jhundi/img/4.jpg')}}" alt="4"></div>
                                <div class="face top" data-value="5"><img src="{{asset('css/jhundi/img/5.jpg')}}" alt="5"></div>
                                <div class="face bottom" data-value="2"><img src="{{asset('css/jhundi/img/2.jpg')}}" alt="6"></div>
                            </div>
                        </div>
                        <div class="scene">
                            <div class="cube" id="cube5">
                                <div class="face front" data-value="1"><img src="{{asset('css/jhundi/img/1.jpg')}}" alt="1"></div>
                                <div class="face back" data-value="3"><img src="{{asset('css/jhundi/img/3.jpg')}}" alt="2"></div>
                                <div class="face right" data-value="6"><img src="{{asset('css/jhundi/img/6.jpg')}}" alt="3"></div>
                                <div class="face left" data-value="4"><img src="{{asset('css/jhundi/img/4.jpg')}}" alt="4"></div>
                                <div class="face top" data-value="5"><img src="{{asset('css/jhundi/img/5.jpg')}}" alt="5"></div>
                                <div class="face bottom" data-value="2"><img src="{{asset('css/jhundi/img/2.jpg')}}" alt="6"></div>
                            </div>
                        </div>
                        <div class="scene">
                            <div class="cube" id="cube6">
                                <div class="face front" data-value="1"><img src="{{asset('css/jhundi/img/1.jpg')}}" alt="1"></div>
                                <div class="face back" data-value="3"><img src="{{asset('css/jhundi/img/3.jpg')}}" alt="2"></div>
                                <div class="face right" data-value="6"><img src="{{asset('css/jhundi/img/6.jpg')}}" alt="3"></div>
                                <div class="face left" data-value="4"><img src="{{asset('css/jhundi/img/4.jpg')}}" alt="4"></div>
                                <div class="face top" data-value="5"><img src="{{asset('css/jhundi/img/5.jpg')}}" alt="5"></div>
                                <div class="face bottom" data-value="2"><img src="{{asset('css/jhundi/img/2.jpg')}}" alt="6"></div>
                            </div>
                        </div>   
                </div>

                <h3 id="winnings"></h3>
            </div>

            <div class="col-md-8">

                <div class="row d-flex flex-row">

                    <div class="col-sm-4 img-div">
                        <img src="{{asset('css/jhundi/img/1.png')}}" alt="" class="img-fluid" data-value="1">
                        <div class="input-field">
                            
                            <input type="number" class="form-control bet-input" placeholder="Enter amount" data-index="1">
                           
                        </div>
                    </div>

                    <div class="col-sm-4 img-div">
                        <img src="{{asset('css/jhundi/img/2.png')}}" alt="" class="img-fluid" data-value="5">
                        <div class="input-field">
                            
                            <input type="number" class="form-control bet-input" placeholder="Enter bet amount" data-index="5" >
                            
                        </div>
                    </div>

                    <div class="col-sm-4 img-div">
                        <img src="{{asset('css/jhundi/img/3.png')}}" alt="" class="img-fluid" data-value="2">
                        <div class="input-field">
                            <input type="number" class="form-control bet-input" placeholder="Enter bet amount" data-index="2">
                        </div>
                    </div>

                    <div class="col-sm-4 img-div">
                        <img src="{{asset('css/jhundi/img/4.png')}}" alt="" class="img-fluid" data-value="4">
                        <div class="input-field">
                            <input type="number" class="form-control bet-input" placeholder="Enter bet amount" data-index="4">
                        </div>
                    </div>

                    <div class="col-sm-4 img-div">
                        <img src="{{asset('css/jhundi/img/5.png')}}" alt="" class="img-fluid" data-value="6">
                        <div class="input-field">
                            <input type="number" class="form-control bet-input" placeholder="Enter bet amount" data-index="6">
                        </div>
                    </div>
                    
                    <div class="col-sm-4 img-div">
                        <img src="{{asset('css/jhundi/img/6.png')}}" alt="" class="img-fluid" data-value="3">
                        <div class="input-field">
                            <input type="number" class="form-control bet-input" placeholder="Enter bet amount" data-index="3">
                        </div>
                    </div>
                </div>

            </div>
        </div>


        
        <div class="row">

            <div class="col-md-12 text-center">

                <h5 id="error"></h5>

                <button id="play-Button" class="btn btn-primary mt-2 text-center">Play</button>

                <button id="reset_Button" class="btn btn-danger mt-2 text-center">Reset Selection</button>

                {{-- <div class=" select">
                    <img src="images/6.gif" alt="" class="img-fluid" data-value="6">
                </div> --}}



            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="{{asset('js/jhundiscript.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body> 

</html>
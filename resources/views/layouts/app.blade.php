<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>What's your score?</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/grayscale.min.css')}}" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="">What's your score?</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('game.index')}}">Game Play</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('boards.index')}}"">Community</a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
         @else
              <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a>
            </li>
              <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('register')}}">Register</a>
            </li>
        
        @endif


          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">
          Sworn Remake 2018</h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5"><br>이번 시즌 당신의 점수는?</h2>
          <button class="btn btn-primary js-scroll-trigger" data-toggle="modal" data-target="#myModal">순위 확인</a>
        </div>
      </div>
    </header>

      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Season 2018</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">  
          @if(Auth::check())
          <p> {{Auth::user()->name}}  님의 기록 </p>
          <p>최고 점수 : {{$score}}</p>
          <p>플레이 횟수 : {{$playtime}}</p>
          <p>퍼센테이지 :</p>
          <p>랭크 : </p>
          @else
              <p>로그인 해주세요</p>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
        </div>
      </div>
      
    </div>
  </div>
    @yield('content')
    

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">

        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
          <div class="col-xl-8 col-lg-7">
            <img class="img-fluid mb-3 mb-lg-0" src="{{asset('template/img/bg-masthead.jpg')}}" alt="">
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="featured-text text-center text-lg-left">
              <h4>Sworn이란?</h4>
              <p class="text-black-50 mb-0">Sworn Remake 2018은 일본 CyberMonkey의 <br>Sworn을 새롭게 재탄생시킨 게임입니다.</p>
            </div>
          </div>
        </div>

        <!-- Project One Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <div class="col-lg-6">
            <img class="img-fluid" src="{{asset('template/img/image1.jpg')}}" alt="">
          </div>
          <div class="col-lg-6">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                  <h4 class="text-white">랭크</h4>
                  <p class="mb-0 text-white-50">전 세계 유저들 중 자신의 순위, 랭크를 확인하세요.</p>
                  <hr class="d-none d-lg-block mb-0 ml-0">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Project Two Row -->
        <div class="row justify-content-center no-gutters">
          <div class="col-lg-6">
            <img class="img-fluid" src="{{asset('template/img/image2.jpg')}}" alt="">
          </div>
          <div class="col-lg-6 order-lg-first">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                  <h4 class="text-white">커뮤니티</h4>
                  <p class="mb-0 text-white-50"> 유저들과 자신만의 팁을 공유하세요.</p>
                  <hr class="d-none d-lg-block mb-0 mr-0">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

   
    

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Sworn Remake 2018
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('template/js/grayscale.min.js')}}"></script>

  </body>

</html>

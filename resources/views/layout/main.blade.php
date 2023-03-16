<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title : '404 Page Not Found' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
      body {
        min-height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
      }

      footer {
        margin-top: auto;
      }
    </style>
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">AndrianDev</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">Home</a>
            </li>
            @if (session('isLogin'))
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('user')) ? 'active' : '' }}" href="/user">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('candidat')) ? 'active' : '' }}" href="/candidat">Candidat</a>
              </li>
            @endif
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @if (session('isLogin'))
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('logout')) ? 'active' : '' }}" href="/logout">Logout</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="/login">Login</a>
              </li> 
            @endif
          </ul>
        </div>
      </div>
    </nav>
    </header>
    
    <div class="container my-3">
        @yield('content')
    </div>

    <footer class="bg-light py-1">
      <p class="text-center text-dark my-3">
        Copyright ©{{ Date('Y') }} <a href="/" class="text-dark text-decoration-none">AndrianDev</a>
      </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
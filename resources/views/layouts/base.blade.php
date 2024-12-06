<html>
    <head>
        <title>Pastelería Santa Lucía</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/all.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Santa Lucía</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="/about">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/cats">Categorías</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/prods">Productos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/ventas">Ventas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/mapas">Mapas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="youtube/search">YouTube</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="twitter/search">Twiter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/weather">Clima</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
        </nav>

        <div class="container">
          @yield('contenido')
        </div>

          <footer>
            <p>Aquí va el footer</p>
          </footer>
    </body>
</html>
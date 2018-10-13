<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="testing features">
    <meta name="author" content="rafa_rosseto@hotmail.com">
	<title>Teste app</title>
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Grid</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/import">Import</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Delivery Routes</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <div class="container">
      @yield('content')
    </div>

<footer class="footer">
<div class="container">
	<span class="text-muted">
		<div class="footer-copyright text-center py-3">© 2018
			<a href="http://rafaelrosseto.com"> RafaelRosseto.com</a>
		</div>
	</span>
</div>
</footer>



    <script src="{{ asset('/js/app.js') }}"></script>


	
</body>
</html>
<?php //@yield('fejlec')
//<br /> <br />
//Ez a tartalom ami minden oldalon megjelenik
//<br /> <br />
//@yield('tartalom')
?>

<!doctype html>
<html class="no-js" lang="hu">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel képgaléria</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
	<link rel="stylesheet" href="{{ url('/css/app.css') }}">
  </head>
  <body>

    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

        <div class="off-canvas position-left reveal-for-large" id="fomenu" data-off-canvas data-position="left">
          <div class="row column">
            <h5>Főmenü</h5>
			<ul class="vertical menu">
				<li><a href="/photo/public/galery">Nyitólap</a></li>
				<?php
				if (!Auth::check()) {
				?>	
					<li><a href="/photo/public/login">Belépés</a></li>
					<li><a href="/photo/public/register">Regisztáció</a></li>
					<?php
				}
				else {
					?>
					<li><a href="/photo/public/galery/create">Új képgaléria</a></li>
					<li><a href="/photo/public/logout">Kilépés</a></li>
					<?php
				}
					?>
			</ul>
          </div>
        </div>

        @yield('tartalom')

          
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>




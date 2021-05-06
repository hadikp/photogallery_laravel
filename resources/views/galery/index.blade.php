
@extends('layouts.main');

@section('tartalom');
	<div class="off-canvas-content" data-off-canvas-content>
          <div class="title-bar hide-for-large">
            <div class="title-bar-left">
              <button class="menu-icon" type="button" data-toggle="fomenu"></button>
              <span class="title-bar-title">Laravel képgaléria</span>
            </div>
          </div>
		  
		  @if(Session::has('uzenet'))
          <div class="callout success" onClick="$(this).fadeOut()">
            {{Session::get('uzenet')}}
            <button class="close-button" type="button">&times;</button>
          </div>
          @endif
		  
          <div class="callout primary">
            <div class="row column">
              <h1>Képgalériák</h1>
			  <p class="lead">
			  <?php
			  if (Auth::check()) {
				  echo 'Szia ' .Auth::user()->name .'! Készíts új képgaláriát és töltsd fel a képeket!';
			  }
			  else {
				  echo 'Bejelentkezés után készíts új képgaláriát és töltsd fel a képeket!';
			  }
			  ?>
              </p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
		  
			<?php
			foreach($galeries as $galery) {
			?>
				<div class="column">
					<a href="/photo/public/galery/show/{{ $galery->id }}">
						<img class="thumbnail" src="boritokepek/<?php echo $galery->cover_image ?>">
					</a>
				  <h5>{{ $galery->name }}</h5>
				  <p> {{ $galery->description }} </p>
				</div>
			<?php
			}
			?>
            
          </div>
@stop
@extends('layouts.main')

@section('tartalom')
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
              <a href="/photo/public">Vissza a galériákhoz</a><br />
              <h1>{{ $galery->name }}</h1>
              <p class="lead">{{ $galery->description }}</p>
              <a class="button gomb" href="/photo/create/{{ $galery->id }}">Új fotó feltöltése</a>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">

            <?php
            foreach($photos as $photo) {
              ?>
              <div class="column">
                <img class="thumbnail" src="/fotok/{{ $galery->id }}/{{ $photo->image }}">
                <h5>{{ $photo->title }}</h5>
                <p>{{ $photo->description }}</p>
              </div>
              <?php
            }
            ?>

          </div>
@stop


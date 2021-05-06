@extends('layouts.main');

@section('tartalom');
	<div class="off-canvas-content" data-off-canvas-content>
          <div class="title-bar hide-for-large">
            <div class="title-bar-left">
              <button class="menu-icon" type="button" data-toggle="fomenu"></button>
              <span class="title-bar-title">Laravel képgaléria</span>
            </div>
          </div>
          <div class="callout primary">
            <div class="row column">
              <h1>Új képgaléria készítése</h1>
              <p class="lead">Készíts új képgaláriát és töltsd fel a képeket!</p>
            </div>
          </div>
           <div class="row small-up-2 medium-up-3 large-up-4">
             <div class="margo">
             {!! Form::open(['action' => 'App\Http\Controllers\GaleryController@store', 'enctype' => 'multipart/form-data']) !!}

                  {!! Form::label('nev','Név') !!}
                  {!! Form::text('nev', $value=null, $attributes=['placeholder'=>'Galéria neve', 'name'=>'nev']) !!}

                  {!! Form::label('leiras','Leírás') !!}
                  {!! Form::text('leiras', $value=null, $attributes=['placeholder'=>'Galéria leírása', 'name'=>'leiras']) !!}

                  {!! Form::label('boritokep','Borítókép') !!}
                  {!! Form::file('boritokep') !!}

                  {!! Form::submit('Létrehozás', $attributes=['class'=>'button']) !!}
                  
              {!! Form::close() !!}
            </div> 
          </div>
@stop
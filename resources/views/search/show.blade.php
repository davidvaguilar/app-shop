@extends('layouts.app')

@section('title', 'Resultados de Busqueda')

@section('body-class', 'profile-page')

@section('styles')
  <style>
    .team{
      padding-bottom: 50px;
    }
    .team .row .col-md-4 {
      margin-bottom: 5em;
    }
    .team .row {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      flex-wrap: wrap;
    }

    .team .row > [class*='col-'] {
      display: flex;
      flex-direction: column;
    }
  </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="profile">
          <div class="avatar">
            <img src="/img/lupa.png" alt="Imagen de una lupa que representa a la pagina de resultados" class="img-circle img-responsive img-raised">
          </div>
          <div class="name">
            <h3 class="title">Resultados de busqueda</h3>
          </div>
          @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
          @endif
        </div>
      </div>
      <div class="description text-center">
        <p>Se encontraron {{ $products->count() }} resultados para el termino {{ $query }}.</p>
      </div>

      <div class="team">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-md-4">
            <div class="team-player">
              <img src="{{ $product->featured_image_url  }}" alt="Thumbnail Image" class="img-raised img-circle"> <!--  $product->images()->first()->image-->
              <h4 class="title">
                <a href="{{ url('/products/'.$product->id ) }}"> {{ $product->name }}
              </h4>
              <p class="description">{{ $product->description }}</p>
            </div>
          </div>
          @endforeach
        </div>

      </div>
      <div class="text-center">
        {{ $products->links() }}
      </div>

    </div>
  </div>
</div>

@include('includes.footer')
@endsection

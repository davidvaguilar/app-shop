@extends('layouts.app')

@section('title', 'Listado de categorias')

@section('body-class', 'product-page')

@section('content')
<div class="wrapper">
  <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
  </div>

  <div class="main main-raised">
    <div class="container">

      <div class="section text-center">
        <h2 class="title">Listado de categorias</h2>
        <div class="team">
          <div class="row">
            <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nuevo categoria</a>
            <table class="table">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th class="col-md-2 text-center">Nombre</th>
                      <th class="col-md-5 text-center">Descripcion</th>
                      <th>Imagen</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($categories as $key => $category)
                  <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description }}</td>
                      <td>
                        <img src="{{ $category->featured_image_url }}" height="50">
                      </td>
                      <td class="td-actions text-right">
                          <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                            {{ csrf_field() }}
                            <button type="button" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                                <i class="fa fa-info"></i>
                            </button>
                            <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                              <i class="fa fa-times"></i>
                            </button>
                          </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>

  </div>

  @include('includes.footer')

</div>
@endsection

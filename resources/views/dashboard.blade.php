<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./">Logo generico</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./logout">log out </a>
      </li>
      @can('Admin-Dashboard')
      <li class="nav-item">
        <a class="nav-link" href="./admin">Admin</a>
      </li>
      @endcan
    </ul>
    <span class="navbar-text ms-auto">
      ¡Hola, {{Auth::user()->name}}! ({{$rol[0]}})
    </span>
  </div>
</nav>
    <!--  -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        @can('Add-Product')
                        <div class="col-sm-12 col-xs-12">
                            <a href="./add" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Añadir nuevo producto</a>
                        </div>
                        @endcan
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @if(auth()->user()->can('Edit-Product') || auth()->user()->can('Delete-Product'))
                                <th>Acción</th>
                                @endif
                                <th>ID</th>
                                <th>Nombre del producto</th>
                                <th>Precio</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $producto)
                            <tr>
                            @if(auth()->user()->can('Edit-Product') || auth()->user()->can('Delete-Product'))
                                <td>
                                    <ul class="action-list">
                                        @can('Edit-Product')
                                        <li><a href="./edit/{{$producto->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></li>
                                        @endcan
                                        @can('Delete-Product')
                                        <li><form action="{{route('del-prod', $producto->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form></li>
                                        @endcan
                                    </ul>
                                </td>
                            @endif
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->name}}</td>
                                <td>{{$producto->price}}</td>
                                <td><a href="./show/{{$producto->id}}" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        {{$products->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
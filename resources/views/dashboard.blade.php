<!DOCTYPE html>
<html lang="en">
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
  <a class="navbar-brand" href="#">Logo generico</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./logout">log out </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">alguna funcionalidad</a>
      </li>
    </ul>
  </div>
</nav>
    <!--  -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <a href="./add" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Añadir nuevo producto</a>
                            <a href="#" class="btn btn-sm btn-light pull-left" style="margin-left: 10px;"><i class="fa fa-repeat"></i> Actualizar</a>
                            
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Acción</th>
                                <th>ID</th>
                                <th>Nombre del producto</th>
                                <th>Precio</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $producto)
                            <tr>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="./edit/{{$producto->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></li>
                                        <li><form action="{{route('del-prod', $producto->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form></li>
                                        
                                    </ul>
                                </td>
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
                        <!-- <div class="col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div> -->
                        <!-- <div class="col-sm-6 col-xs-6">
                            <ul class="pagination hidden-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                            <ul class="pagination visible-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
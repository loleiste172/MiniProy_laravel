<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
    @can('View-dashboard')
      <li class="nav-item">
        <a class="nav-link" href="./dashboard">dashboard</a>
      </li>
      @endcan
    </ul>
    <span class="navbar-text ms-auto">
      ¡Hola, {{Auth::user()->name}}! ({{$rol}})
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
                        <div class="col-sm-12 col-xs-12">
                            @can('Add-User')
                            <a href="./add_user" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Añadir nuevo usuario</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            @if(auth()->user()->can('Edit-User') || auth()->user()->can('Del-User'))
                                <th>Acción</th>
                            @endif
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            @if(auth()->user()->can('Edit-User') || auth()->user()->can('Del-User'))
                                <td>
                                    <ul class="action-list">
                                        @can('Edit-User')
                                        <li><a href="./edit_user/{{$user->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></li>
                                        @endcan
                                        @can('Del-User')
                                        <li><form action="{{route('a-del-user', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form></li>
                                        @endcan
                                    </ul>
                                </td>
                                @endif
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        {{$users->onEachSide(1)->links()}}
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
@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        Categorias
       <a href="{{route('categoria.create')}}" class="btn btn-sm btn-success">Nova categoria</a>
    </h1>
@endsection

@section('content')
<div class="card">   
<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th>Titulo</th>
                <th>conteudo</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
    <tr>
        <td>{{$categoria->id}}</td>
        <td>{!!$categoria->title!!}</td>
        <td>{!!$categoria->body!!}</td>
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
            <a href="" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="" class="d-inline" onsubmit="return confirm('Tem certeza que deseja Excluir?')">
            @method('DELETE')
            @csrf
                <button class="btn btn-sm btn-danger"> Excluir</button>
            </form>
     
          
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $categorias->links('pagination::bootstrap-4') }}
@endsection
@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        Página Home
       <a href="{{route('homecreate')}}" class="btn btn-sm btn-success">Editar Home</a>
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
    @foreach($home as $hom)
    <tr>
        <td>{{$hom->id}}</td>
        <td>{{$hom->title}}</td>
        <td>{{$hom->body}}</td>
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


@endsection
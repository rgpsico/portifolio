@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        Meu Portifolio
       <a href="{{route('portifolio.create')}}" class="btn btn-sm btn-success">Novo trabalho</a>
    </h1>
@endsection
@include('Admin.includes.alert')
@section('content')
<div class="card">   
<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th>cover</th>
                <th>Titulo</th>
                <th>conteudo</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($portifolios as $portifolio)
    <tr>
        <td>{{$portifolio->id}}</td>
        <td><img src="{{Storage::url($portifolio['cover'])}}" alt="" width="100px" height="100px"></td>
        <td>{{$portifolio->title}}</td>
        <td>{{$portifolio->body}}</td>
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
            <a href="{{route('portifolio.edit',['portifolio'=> $portifolio->id])}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('portifolio.destroy',['portifolio'=>$portifolio->id])}}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja Excluir?')">
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

{{ $portifolios->links('pagination::bootstrap-4') }}
@endsection
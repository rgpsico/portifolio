@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        Meus usuários
       <a href="{{route('pages.create')}}" class="btn btn-sm btn-success">Nova Pagina</a>
    </h1>
@endsection

@section('content')
<div class="card">   
<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th>Titulo</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
    <tr>
        <td>{{$page->id}}</td>
        <td>{{$page->title}}</td>
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
            <a href="{{route('pages.edit',['page'=> $page->id])}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('pages.destroy',['page'=>$page->id])}}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja Excluir?')">
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

{{ $pages->links('pagination::bootstrap-4') }}
@endsection
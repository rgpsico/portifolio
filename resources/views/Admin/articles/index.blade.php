@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <h1>
        artigosssaaaa
       <a href="{{route('articles.create')}}" class="btn btn-sm btn-success">Novo  Artigos</a>
    </h1>
        @include('Admin.includes.alert')
@endsection

@section('content')
<div class="card">   
<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th width="50">Cover</th>
                <th>Titulo</th>
                <th>Categoria</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
    <tr>
        <td>{{$article->id}}</td>
        <td><img src="{{Storage::url($article['cover'])}}" alt="" width="100px" height="100px"></td>
        <td>{{ $article->title}}</td>
        <td>{{ $article->categoria}}</td>

            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
            <a href="{{route('articles.edit',['article'=> $article->id])}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('articles.destroy',['article'=>$article->id])}}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja Excluir?')">
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

{{ $articles->links('pagination::bootstrap-4') }}
@endsection
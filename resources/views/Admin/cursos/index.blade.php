@extends('adminlte::page')

@section('title','cursos')

@section('content_header')
    <h1>
  cursos:
       <a href="{{route('cursos.create')}}" class="btn btn-sm btn-success">Cadastra Curso</a>
    </h1>
@endsection

@section('content')
<div class="card">   
<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th>Linguagem</th>
                <th>Plataforma</th>
                <th>conteudo</th>
                <th>Data</th>
            
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($cursos as $curso)
    <tr>
        <td>{{$curso->id}}</td>
        <td>{!!$curso->linguagem!!}</td>
        <td>{!!$curso->plataforma!!}</td>
        <td>{!!$curso->body!!}</td>
        <td>{!!$curso->data!!}</td>
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
                     
            <a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('cursos.destroy', $curso->id)}}" class="d-inline" 
            onsubmit="return confirm('Tem certeza que deseja Excluir?')">
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

{{ $cursos->links('pagination::bootstrap-4') }}
@endsection
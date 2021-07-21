@extends('adminlte::page')

@section('title','Experiencias')

@section('content_header')
    <h1>
  Experiencias:
       <a href="{{route('experiencia.create')}}" class="btn btn-sm btn-success">Nova Experiência</a>
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
                <th>Plataforma</th>
                <th>Data Inicio</th>
                <th>Data Fim</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($experiencias as $experiencia)
    <tr>
        <td>{{$experiencia->id}}</td>
        <td>{!!$experiencia->title!!}</td>
        <td>{!!$experiencia->body!!}</td>
        <td>{!!$experiencia->plataforma!!}</td>
        <td>{!!$experiencia->datestart!!}</td>
        <td>{!!$experiencia->dateend!!}</td>
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
                     
            <a href="{{route('experiencia.edit',$experiencia->id)}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('experiencia.destroy', $experiencia->id)}}" class="d-inline" 
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

{{ $experiencias->links('pagination::bootstrap-4') }}
@endsection
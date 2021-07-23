@extends('adminlte::page')

@section('title','interesses')

@section('content_header')
    <h1>
  interesses:
       <a href="{{route('interesses.create')}}" class="btn btn-sm btn-success">Criar Interesse</a>
    </h1>
@endsection


@section('content')
@include("Admin.includes.alert")
<div class="card">   
<table class="table table-hover">
    <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nome</th>
                <th>icon</th>
              
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($interesses as $interesse)
    <tr>
        <td>{{$interesse->id}}</td>
        <td>{!!$interesse->nome!!}</td>
        <td><i class="far fa-fw {!!$interesse->icon!!} "></i></td>
     
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
                     
            <a href="{{route('interesses.edit',$interesse->id)}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('interesses.destroy', $interesse->id)}}" class="d-inline" 
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

{{ $interesses->links('pagination::bootstrap-4') }}
@endsection
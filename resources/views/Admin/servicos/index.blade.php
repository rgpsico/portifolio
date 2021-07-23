@extends('adminlte::page')

@section('title','servicos')

@section('content_header')
    <h1>
  servicos:
       <a href="{{route('servicos.create')}}" class="btn btn-sm btn-success">Criar servico</a>
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
                <th>Descricao</th>
                <th>icon</th>
              
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    @foreach($servicos as $servico)
    <tr>
        <td>{{$servico->id}}</td>
        <td>{!!$servico->nome!!}</td>
        <td>{!!$servico->descricao!!}</td>
        <td><i class="far fa-fw {{$servico->icon}} "></i>{!!$servico->icon!!} </td>
     
            <td>
            <a href="" class="btn btn-sm btn-success">ver</a>
                     
            <a href="{{route('servicos.edit',$servico->id)}}" class="btn btn-sm btn-info">Editar</a>
        
            <form method="POST" action="{{route('servicos.destroy', $servico->id)}}" class="d-inline" 
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

{{ $servicos->links('pagination::bootstrap-4') }}
@endsection
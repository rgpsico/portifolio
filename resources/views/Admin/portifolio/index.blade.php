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
                <th>conteúdo</th>
                <th>categoria</th>
                <th width="200">Ações</th>
            </tr>
    </thead>
    <tbody>
    
    </tbody>
</table>
</div>

{{ $portifolios->links('pagination::bootstrap-4') }}
@endsection
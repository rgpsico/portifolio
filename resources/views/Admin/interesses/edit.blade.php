@extends('adminlte::page')

@section('title','Editar Paginas')

@section('content_header')
    <h1>
        Editar Paginas
    
    </h1>
@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <h5><i class="icon fas fa-ban"></i>Ocorreu um error</h5>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{@$error}}</li>
        @endforeach
    </ul>
  </div>
@endif
<div class="card">
  
    <div class="card-body">
<form class="form-horizontal" action="{{route('interesses.update', $interesses->id)}}" method="POST" >
  
    @method("PUT")
    @include('admin.interesses._partials.form')
  </form>
</div>
</div>

@endsection
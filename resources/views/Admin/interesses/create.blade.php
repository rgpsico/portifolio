@extends('adminlte::page')

@section('interesses','Nova Pagina')

@section('content_header')
    <h1>
        Criar Interesses
    
    </h1>
@endsection

@section('content')

@include("Admin.includes.alert")
<div class="card">
  
    <div class="card-body">
<form class="form-horizontal" method="POST" action="{{route('interesses.store')}}">
    @csrf
    @include('admin.interesses._partials.form')
    </form>
</div>
</div>

  

@endsection
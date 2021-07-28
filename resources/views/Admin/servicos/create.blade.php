@extends('adminlte::page')

@section('servicos','Nova Pagina')

@section('content_header')
    <h1>
        Criar servicos
    
    </h1>
@endsection

@section('content')

@include("Admin.includes.alert")
<div class="card">
  
    <div class="card-body">
<form class="form-horizontal" method="POST" action="{{route('servicos.store')}}">
    @csrf
    @include('Admin.servicos._partials.form')
    </form>
</div>
</div>

  

@endsection
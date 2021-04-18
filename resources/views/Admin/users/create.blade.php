@extends('adminlte::page')

@section('title','Novo Usuário')

@section('content_header')
    <h1>
        Novo usuários
    
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
<form class="form-horizontal" method="POST" action="{{route('users.store')}}">
    @csrf
 
            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror id="name"  value="{{old('name')}}">
                    </div>
            </div>
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="text"  name="email" class="form-control  @error('email') is-invalid @enderror " id="email" value="{{old('email')}}">
                    </div>
            </div>

            <div class="form-group row">            
                    <label for="nome" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="text"  name="password" class="form-control @error('password') is-invalid @enderror" id="password" >
                    </div>
            </div>


        <div class="form-group row">         
                <label for="nome" class="col-sm-2 col-form-label">Confirmação da senha</label>
                    <div class="col-sm-10">
                        <input type="text"  name="password_confirmation" class="form-control" id="password_confirmation" >
                    </div>
         </div>

    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
@endsection
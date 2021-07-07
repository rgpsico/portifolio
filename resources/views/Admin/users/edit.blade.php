@extends('adminlte::page')

@section('title','Editar Usuario')

@section('content_header')
    <h1>
        Editar Usuario
    
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
<form class="form-horizontal" action="{{route('users.update', ['user'=>$user->id])}}" method="POST" >
    @csrf
    @method("PUT")
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror id="name"  value="{{$user->name}}">
                    </div>
            </div>
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="text"  name="email" class="form-control  @error('email') is-invalid @enderror " id="email" value="{{$user->email}}">
                    </div>
            </div>

            <div class="form-group row">            
                    <label for="nome" class="col-sm-2 col-form-label">Nova Senha</label>
                        <div class="col-sm-10">
                            <input type="text"  name="password" class="form-control @error('password') is-invalid @enderror" id="password" >
                    </div>
            </div>


        <div class="form-group row">         
                <label for="nome" class="col-sm-2 col-form-label">Confirmação da nova senha</label>
                    <div class="col-sm-10">
                        <input type="text"  name="password_confirmation" class="form-control" id="password_confirmation" >
                    </div>
         </div>

         <div class="form-group row">            
            <label for="nome" class="col-sm-2 col-form-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror" id="image" >
            </div>
    </div>

    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
@endsection
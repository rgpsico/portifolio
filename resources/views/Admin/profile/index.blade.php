@extends('adminlte::page')

@section('title','Meu Perfil')

@section('content_header')
<h1>meu Perfil</h1>

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

@if(session('warning'))
<div class="alert alert-success">
  
    
      {{session('warning')}}
   
  </div>
@endif
<div class="card">
  
    <div class="card-body">
<form class="form-horizontal" action="{{route('profile.save')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method("PUT")
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror id="name"  value="{{$user->name}}">
                    </div>
            </div>

              

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Imagem Background - Home</label>
                    <div class="col-sm-10">
                        <input type="file"  name="imageBG" class="" id="imageBG" >
                    </div>
            </div>
            
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="text"  name="email" class="form-control  @error('email') is-invalid @enderror " id="email" value="{{$user->email}}">
                    </div>
            </div>

            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Tempo de experiência</label>
                    <div class="col-sm-10">
                        <input type="text"  name="anosExperiencia" class="form-control  @error('anosExperiencia') is-invalid @enderror " id="anosExperiencia" value="{{$user->anosExperiencia}}">
                    </div>
            </div>

            
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Numero de projetos</label>
                    <div class="col-sm-10">
                        <input type="text"  name="numeroProjetos" class="form-control  @error('numeroProjetos') is-invalid @enderror " id="numeroProjetos" value="{{$user->numeroProjetos}}">
                    </div>
            </div>

            <div class="form-group row">            
                <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4">{{$user->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Cel</label>
                    <div class="col-sm-10">
                        <input type="text"  name="cel" class="form-control  @error('cel') is-invalid @enderror " id="cel" value="{{$user->cel}}">
                    </div>
            </div>

            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-10">
                        <input type="text"  name="estate" class="form-control  @error('estate') is-invalid @enderror " id="estate" value="{{$user->estate}}">
                    </div>
            </div>

            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Bairro</label>
                    <div class="col-sm-10">
                        <input type="text"  name="bairro" class="form-control  @error('bairro') is-invalid @enderror " id="bairro" value="{{$user->bairro}}">
                    </div>
            </div>

            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Curriculum</label>
                    <div class="col-sm-10">
                        <input type="file"  name="curriculum" id="curriculum">
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
                    <input type="file"  name="image" class="" id="image" >
            </div>

    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>

@endsection
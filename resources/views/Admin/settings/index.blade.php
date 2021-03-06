@extends('adminlte::page')

@section('title','Configurações')

@section('content_header')
<h1>Configurações</h1>

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
        <form action="{{route('settings.save')}}" method="POST" class="form-horizontal">
            @method('PUT')
            @csrf

            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Titulo do site</label>
                <div class="col-sm-10">
                    <input type="text" name="title" value="{{@$settings['title']}}" class="form-control">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sub-titulo do site</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="{{@$settings['subtitle']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{@$settings['email']}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Imagem de fundo</label>
                            <div class="col-sm-10">
                                <input type="text" name="imagemfundo" value="{{@$settings['imagemfundo']}}" class="form-control">
                            </div>
                        </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cor fundo</label>
                            <div class="col-sm-10">
                                <input type="color" name="bgcolor" value="{{@$settings['bgcolor']}}" class="form-control">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cor Texto</label>
                                <div class="col-sm-10">
                                    <input type="color" name="text" value="{{@$settings['textcolor']}}" class="form-control">
                                </div>
                            </div>


            <div class="form-group row">
                <label  class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>
        
        </form>
    </div>
</div>

@endsection
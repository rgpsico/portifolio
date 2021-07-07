@extends('adminlte::page')

@section('title','Nova Pagina')

@section('content_header')
    <h1>
        Novo POST
    
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
<form class="form-horizontal" method="POST" action="{{route('articles.store')}}"  enctype="multipart/form-data">
    @csrf
    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
      
                    <select  name="categoria"  class="form-control"> 
                        @foreach($categorias->all() as $cat)
                        <option value="{{$cat['id']}}">{{$cat['title']}}</option>      
                        @endforeach       
                    </select>       
         
            </div>
    </div>
            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Titulo do Post</label>
                    <div class="col-sm-10">
                        <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror id="name"  value="{{old('title')}}">
                    </div>
            </div>
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">                         
                        <textarea name="body" class="form-control bodyfield">{{old('body')}} </textarea>                      
                    </div>
            </div>

            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">                         
                        <input type="file" name="image"/>                  
                    </div>
            </div>

    <div class="form-group row">  
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{asset('assets/js/select2.js')}}"></script>

@endsection
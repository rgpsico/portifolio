@extends('adminlte::page')

@section('title','Editar Paginas')

@section('content_header')
    <h1>
        Editar Portifolio
    
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
<form class="form-horizontal" action="{{route('portifolio.update', ['portifolio'=>$article->id])}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group row">       
        <label for="nome" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <select  name="categoria"  class="form-control"> 
                    @foreach($categorias->all() as $cat)
                    <option value="{{$cat['title']}}">{{$cat['title']}}</option>      
                    @endforeach       
                </select>
            </div>
    </div>
        <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                        <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror" id="title"  value="{{$article->title}}">
                    </div>
            </div>
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" class="form-control bodyfield" >{{$article->body}}</textarea>  
                    </div>
            </div>

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text"  name="url" class="form-control @error('url') is-invalid @enderror" id="url"  value="{{$article->title}}">
                    </div>
            </div>

            <div class="form-group row">            
                <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                    <div class="col-sm-10">                         
                        <input type="file" name="image" class="form-control"/>                   
                    </div>
            </div>

      

    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>



<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link', 'table', 'image', 'autoresize', 'lists'],
        toolbar:'undor redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });
    </script>
@endsection
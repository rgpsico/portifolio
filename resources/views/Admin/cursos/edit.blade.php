@extends('adminlte::page')

@section('title','Editar Paginas')

@section('content_header')
    <h1>
        Editar Paginas 10
    
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
<form class="form-horizontal" action="{{route('cursos.update', $cursos->id)}}" method="POST" >
    @csrf
    @method("PUT")
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Linguagens:</label>
            <div class="col-sm-10">
                <input type="text"  name="linguagem" class="form-control @error('linguagem') is-invalid @enderror " id="linguagem"  value="{{$cursos->linguagem}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Plataforma:</label>
            <div class="col-sm-10">
                <input type="text"  name="plataforma" class="form-control @error('plataforma') is-invalid @enderror " id="title"  value="{{$cursos->plataforma}}">
            </div>
        </div>

       

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Ano:</label>
            <div class="col-sm-10">
                <input type="text"  name="ano" class="form-control @error('ano') is-invalid @enderror " id="ano"  value="{{$cursos->data}}">
            </div>
        </div>
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Conteudo do curso:</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" class="form-control bodyfield" >{{$cursos->body}}</textarea>  
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

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
<form class="form-horizontal" action="{{route('experiencia.update', $experiencia->id)}}" method="POST" >
    @csrf
    @method("PUT")
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Linguagens:</label>
            <div class="col-sm-10">
                <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror " id="title"  value="{{$experiencia->title}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Empresa:</label>
            <div class="col-sm-10">
                <input type="text"  name="place" class="form-control @error('place') is-invalid @enderror " id="place"  value="{{$experiencia->place}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Data Inicio</label>
            <div class="col-sm-10">
                <input type="date"  name="datestart" class="form-control @error('datestart') is-invalid @enderror " id="datestart"  value="{{$experiencia->datestart}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Data fim</label>
            <div class="col-sm-10">
                <input type="date"  name="dateend" class="form-control @error('dateend') is-invalid @enderror " id="dateend"  value="{{$experiencia->dateend}}">
            </div>
        </div>
   
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" class="form-control bodyfield" >{{$experiencia->body}}</textarea>  
                    </div>
            </div>
            

      

    <div class="form-group row">  
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
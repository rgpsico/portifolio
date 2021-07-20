@extends('adminlte::page')

@section('title','Nova Pagina')

@section('content_header')
    <h1>
        Cadastrar Curso
    
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
<form class="form-horizontal" method="POST" action="{{route('cursos.store')}}">
    @csrf
    <div class="form-group row">       
           
    </div>
            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Linguagem:</label>
                    <div class="col-sm-10">
                        <input type="text"  name="linguagem" class="form-control @error('linguagem') is-invalid @enderror " id="linguagem"  value="{{old('linguagem')}}">
                    </div>
            </div>

            <div class="form-group row">       
                <label for="nome" class="col-sm-2 col-form-label">Plataforma</label>
                    <div class="col-sm-10">
                        <input type="text"  name="plataforma" class="form-control @error('plataforma') is-invalid @enderror id="name"  value="{{old('plataforma')}}">
                    </div>
            </div>
   
             <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Ano</label>
                    <div class="col-sm-10">                         
                        <input type="text"  name="data" class="form-control @error('data') is-invalid @enderror " id="data"  value="{{old('data')}}">
                    </div>
            </div>

            
            <div class="form-group row">            
                <label for="nome" class="col-sm-2 col-form-label">Sobre o Curso</label>
                    <div class="col-sm-10">                         
                        <textarea name="body" class="form-control bodyfield">{{old('body')}} </textarea>                      
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


$('.selectjs').select2({   
    escapeMarkup: function (markup) {
     return markup;
 }
        
   
});



$(document).on('click', '.inserir', function() {
  alert(1);
});

ListarProfissionais();
function ListarProfissionais(){ 
    let token = localStorage.getItem('tk');
    $.ajax({
    url : "https://jsonplaceholder.typicode.com/users",
    headers: {  
            'Content-Type':'json',             
            'x-access-token':token,
    },
    type : 'get',  
    success : function(data){
        console.log(data)
        $('#ProfissionalID').val();
    try {    
        qtd = data.length;
        for(i=0; i<=qtd; i++){           
            $('#mySelect2').append('<option  value="'+ data[i].id +'" data-sysuser="'+data[i].nome+'">'+data[i].nome +'</option>');
        }
    }   catch (error) {

    }
    }, "noResults": function(){
        return "Que cadastrar Esse paciente <a href='#' class='btn btn-success cadastrar'>UCadastrar</a>";
    },
    escapeMarkup: function (markup) {
     return markup;
 }
})
}
  
    </script>
@endsection
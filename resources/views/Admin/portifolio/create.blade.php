@extends('adminlte::page')

@section('title', 'Novo Serviço')

@section('content_header')
    <h1 class="mb-3">
        <i class="fas fa-plus-circle"></i> Novo Serviço
    </h1>
@endsection

@section('content')

    {{-- Mensagens de erro --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <h5><i class="icon fas fa-ban"></i> Ocorreu um erro</h5>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card do formulário --}}
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title"><i class="fas fa-edit"></i> Cadastrar Serviço</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('portifolio.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Categoria --}}
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-control select2 @error('categoria') is-invalid @enderror">
                        <option value="">Selecione...</option>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat['title'] }}" {{ old('categoria') == $cat['title'] ? 'selected' : '' }}>
                                {{ $cat['title'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Título --}}
                <div class="form-group">
                    <label for="title">Título do Serviço</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" placeholder="Digite o título">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Descrição --}}
                <div class="form-group">
                    <label for="body">Descrição</label>
                    <textarea name="body" class="form-control bodyfield @error('body') is-invalid @enderror" rows="6">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- URL --}}
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url"
                        class="form-control @error('url') is-invalid @enderror"
                        value="{{ old('url') }}" placeholder="https://...">
                    @error('url')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Imagem --}}
                <div class="form-group">
                    <label for="image">Imagem</label>
                    <input type="file" name="image" id="image"
                        class="form-control-file @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botão --}}
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // TinyMCE

         $(document).ready(function() {
        tinymce.init({
            selector: 'textarea.bodyfield',
            height: 300,
            menubar: false,
            plugins: ['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist | table | link image',
            content_css: ['{{ asset('assets/css/content.css') }}'],
            images_upload_url: '{{ route('imageupload') }}',
            images_upload_credentials: true,
            convert_urls: false
        });

        // Select2
       
            // $('.select2').select2({
            //     placeholder: "Selecione uma categoria",
            //     allowClear: true,
            //     width: '100%'
            // });
        });
    </script>

@endsection


<div class="form-group row">       
    @csrf
</div>
        <div class="form-group row">       
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text"  name="nome" class="form-control @error('nome') is-invalid @enderror" id="name"  value="{{$interesses->nome ?? old('nome')}}">
                </div>
        </div>
        

        <div class="form-group row">       
            <label for="nome" class="col-sm-2 col-form-label">Icon:</label>
                <div class="col-sm-10">
                    <input type="text"  name="icon" class="form-control @error('icon') is-invalid @enderror"  id="icon"  value="{{$interesses->icon ?? old('icon')}}">
                </div>
        </div>

        

<div class="form-group row">  
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        @php 
        $route = (Route::getCurrentRoute()->getName() == "interesses.edit" ? "Salvar" : "Cadastrar");

          

        @endphp 
        <button type="submit" class="btn btn-success">{{$route}}</button>
    </div>
</div>

<!-- /.box-footer -->

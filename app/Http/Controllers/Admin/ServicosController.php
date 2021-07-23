<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\servicos;

class servicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
    {
     $servicos = servicos::paginate(10);
     $loggedId = intval(Auth::id());
    

      return view('Admin.servicos.index',[
        'servicos'=>$servicos
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicos = servicos::all();
        return view('Admin.servicos.create',['categorias'=>$servicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nome',
            'descricao',
            'icon'
       
        ]);
        
        $validator = Validator::make($data,[
            'nome'=> ['required','string','max:100'],
            'descricao'=> ['required','string','max:100'],
            'icon'=> ['string'],
        ]);

        if($validator->fails()){
            return redirect()->route('servicos.create')
            ->withErrors($validator)
            ->withInput();
        }
        
    
        $servicos = new servicos;
        $servicos->nome =  $data['nome'];
        $servicos->descricao =  $data['descricao'];
        $servicos->icon = $data['icon'];
        $servicos->save();

        return redirect()->route('servicos.index')
        ->withSuccess("Cadastrado com sucesso");;;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicos = servicos::find($id);
        if($servicos){
            return view('Admin.servicos.edit',[
                'servicos'=>$servicos
            ]);
        }
        return redirect()->route('servicos.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $servicos = servicos::find($id);
        
        if($servicos){
            $data = $request->only([
                'nome',
                'descricao',
                'icon'         
            ]);

        $servicos->nome = $data['nome'];
        $servicos->descricao = $data['descricao'];
        $servicos->icon = $data['icon'];
       
      
        $servicos->save();
    }
        return redirect()->route('servicos.index')
        ->withSuccess("Atualizado com sucesso");;
 
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $page = servicos::find($id);
            $page->delete();   
            return redirect()->route('servicos.index')
            ->withSuccess("Excluido com sucesso");
    }
}

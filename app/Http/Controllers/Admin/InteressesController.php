<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\interesses;

class InteressesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
    {
     $interesses = interesses::paginate(10);
     $loggedId = intval(Auth::id());
    

      return view('Admin.interesses.index',[
        'interesses'=>$interesses
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interesses = interesses::all();
        return view('Admin.interesses.create',['categorias'=>$interesses]);
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
            'icon'
       
        ]);
        
        $validator = Validator::make($data,[
            'nome'=> ['required','string','max:100'],
            'icon'=> ['string'],
        ]);

        if($validator->fails()){
            return redirect()->route('interesses.create')
            ->withErrors($validator)
            ->withInput();
        }
        
    
        $interesses = new interesses;
        $interesses->nome =  $data['nome'];
        $interesses->icon = $data['icon'];
        $interesses->save();

        return redirect()->route('interesses.index')
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
        $interesses = interesses::find($id);
        if($interesses){
            return view('Admin.interesses.edit',[
                'interesses'=>$interesses
            ]);
        }
        return redirect()->route('interesses.index');
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
       
        $interesses = interesses::find($id);
        
        if($interesses){
            $data = $request->only([
                'nome',
                'icon'         
            ]);

        $interesses->nome = $data['nome'];
        $interesses->icon = $data['icon'];
       
      
        $interesses->save();
    }
        return redirect()->route('interesses.index')
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
            $page = interesses::find($id);
            $page->delete();   
            return redirect()->route('interesses.index')
            ->withSuccess("Excluido com sucesso");
    }
}

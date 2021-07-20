<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\cursos;

class CursosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
    {
     $cursoss = cursos::paginate(10);
     $loggedId = intval(Auth::id());
    

      return view('Admin.cursos.index',[
        'cursos'=>$cursoss
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = cursos::all();
        return view('admin.cursos.create',['categorias'=>$cursos]);
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
            'linguagem',
            'body',
            'data',
            'plataforma'
       
        ]);
        
        $validator = Validator::make($data,[
            'linguagem'=> ['required','string','max:100'],
            'body'=> ['string'],
      
         
           
        ]);

        if($validator->fails()){
            return redirect()->route('cursos.create')
            ->withErrors($validator)
            ->withInput();
        }
        
    
        $cursos = new cursos;
        $cursos->linguagem =  $data['linguagem'];
        $cursos->plataforma = $data['plataforma'];
        $cursos->body = $data['body'];
   
        $cursos->save();

        return redirect()->route('cursos.index');
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
        $cursos = cursos::find($id);
        if($cursos){
            return view('Admin.cursos.edit',[
                'cursos'=>$cursos
            ]);
        }
        return redirect()->route('cursos.index');
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
        $cursos = cursos::find($id);
        
        if($cursos){
            $data = $request->only([
                'linguagem',
                'body',
                'plataforma',
                'ano'          
            ]);

           
           
            if($cursos['linguagem'] !== $data['linguagem']){
           
                
                $validator = Validator::make($data,[
                    'linguagem'=>['required','string','max:100'],
                    'body'=> ['string']
                    
                ]);
            } else {
                $validator = Validator::make($data,[
                    'linguagem'=>['required','string','max:100'],
                    'body'=> ['string']
                ]);
        }         
            if($validator->fails()){
            return redirect()->route('cursos.edit',[
                'cursos'=>$id
            ])
            ->withErrors($validator)
            ->withInput();
        }
      
       
        $cursos->linguagem = $data['linguagem'];
        $cursos->plataforma = $data['plataforma'];
        $cursos->body  = $data['body'];
        $cursos->data   = $data['ano'];
      
        $cursos->save();
    }
        return redirect()->route('cursos.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $page = cursos::find($id);
            $page->delete();   
            return redirect()->route('cursos.index');
    }
}

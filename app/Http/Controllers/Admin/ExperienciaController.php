<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\experiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\categoria;

class ExperienciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
    {
     $experiencias = experiencia::paginate(10);
     $loggedId = intval(Auth::id());
     $categorias = categoria::all();

      return view('Admin.experiencia.index',[
        'experiencias'=>$experiencias
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::all();
        return view('Admin.experiencia.create',['categorias'=>$categorias]);
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
            'title',
            'body',
            'datestart',
            'dateend',
            'place'
       
        ]);
        
        $validator = Validator::make($data,[
            'title'=> ['required','string','max:100'],
            'body'=> ['string'],
      
         
           
        ]);

        if($validator->fails()){
            return redirect()->route('experiencia.create')
            ->withErrors($validator)
            ->withInput();
        }
        
    
        $experiencia = new experiencia;
        $experiencia->title =  $data['title'];
        $experiencia->place = $data['place'];
        $experiencia->body = $data['body'];
        $experiencia->datestart = $data['datestart'];
        $experiencia->dateend = $data['dateend'];
        $experiencia->save();

        return redirect()->route('experiencia.index');
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
        $experiencia = experiencia::find($id);
        if($experiencia){
            return view('admin.experiencia.edit',[
                'experiencia'=>$experiencia
            ]);
        }
        return redirect()->route('experiencia.index');
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
        $experiencia = experiencia::find($id);
        
        if($experiencia){
            $data = $request->only([
                'title',
                'body',
                'datestart',
                'dateend' 
           
            ]);

           
           
            if($experiencia['title'] !== $data['title']){          
                    $validator = Validator::make($data,[
                    'title'=>['required','string','max:100'],
                    'body'=> ['string']
                    
                ]);
            } else {
                $validator = Validator::make($data,[
                    'title'=>['required','string','max:100'],
                    'body'=> ['string']
                ]);
        }         
            if($validator->fails()){
            return redirect()->route('portifolio.edit',[
                'portifolio'=>$id
            ])
            ->withErrors($validator)
            ->withInput();
        }
      
       
        $experiencia->title = $data['title'];
        $experiencia->body  = $data['body'];
        $experiencia->datestart   = $data['datestart'];
        $experiencia->dateend   = $data['dateend'];
        $experiencia->save();
    }
        return redirect()->route('experiencia.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $page = experiencia::find($id);
            $page->delete();   
            return redirect()->route('experiencia.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\portifolio;
use App\Models\categoria;
use Illuminate\Support\Facades\Storage;

class PortifolioController extends Controller
{
  
    
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
    {
     $portifolios = portifolio::paginate(10);
     $loggedId = intval(Auth::id());
   

      return view('Admin.portifolio.index',[
          'portifolios'=>$portifolios
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
        return view('Admin.portifolio.create',['categorias'=>$categorias]);
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
            'categoria',
            'url',
            'image'
        
        ]);
        
        $validator = Validator::make($data,[
            'title'=> ['required','string','max:100'],
            'body'=> ['string'],
            'categoria'=>['string','max:100'],           
            'url'=>['string','max:100']
         
           
        ]);

        if($validator->fails()){
            return redirect()->route('portifolio.create')
            ->withErrors($validator)
            ->withInput();
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $upload = $request->file('image')->store('portifolio');
      
        }
        
        $Page = new portifolio;
        $Page->title =  $data['title'];
        $Page->body = $data['body'];
        $Page->categoria  = $data['categoria'];
        $Page->url  = $data['url'];
        $Page->cover  = $upload;
        $Page->save();

        return redirect()->route('portifolio.index')->withSuccess("Cadastrado com Sucesso");
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
        $categorias = categoria::all();
        $page = portifolio::find($id);
        if($page){
            return view('Admin.portifolio.edit',[
                'article'=>$page,
                'categorias'=>$categorias
            ]);
        }
        return redirect()->route('portifolio.index');
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
        $page = portifolio::find($id);
        
        if($page){
            $data = $request->only([
                'title',
                'body',
                'url',
                'image',
                'categoria'            
            ]);

           
           
            if($page['title'] !== $data['title']){
           
                
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
      
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $upload = $request->file('image')->store('portifolio');
            $page->cover  = $upload;
      
        }
       
        $page->title = $data['title'];
        $page->body  = $data['body'];
        $page->url   = $data['url'];
        $page->categoria   = $data['categoria'];
      
        $page->save();
    }
    return redirect()->route('portifolio.index')->withSuccess("Atualizado com Sucesso");
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $page = portifolio::find($id);
            $page->delete();   
            return redirect()->route('portifolio.index')->withSuccess("Removido com Sucesso");
    }
}

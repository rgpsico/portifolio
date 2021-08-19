<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\article;
use App\Models\categoria;



class ArticleController extends Controller
{
  
    
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
    {
     $articles = article::paginate(10);
     $loggedId = intval(Auth::id());
     $categorias = categoria::all();
   

      return view('Admin.articles.index',[
          'articles'=>$articles,
          'categorias'=>$categorias

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
        return view('Admin.articles.create',
      ['categorias'=>$categorias]);
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
            'image',
            'categoria'
        
        ]);

 
        
        $validator = Validator::make($data,[
            'title'=> ['required','string','max:100'],
            'body'=> ['string'],
            'categoria'=>['string','max:100']
           

        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('portifolio', $nameFile);
      
        }

        if($validator->fails()){
            return redirect()->route('articles.create')
            ->withErrors($validator)
            ->withInput();
        }
        $Page = new article;
        $Page->title =  $data['title'];
        $Page->body = $data['body'];
        $Page->categoria  = $data['categoria'];
        $Page->cover  = $nameFile;
        $Page->save();

        return redirect()
        ->route('articles.index')
        ->withSuccess("Cadastrado com Successo");
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
        $page = article::find($id);
        if($page){
            return view('Admin.articles.edit',[
                'article'=>$page
            ]);
        }
        return redirect()->route('articles.index');
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
        $article = article::find($id);
        
        if($article){
            $data = $request->only([
                'title',
                'body',              
            ]);
            if($article['title'] !== $data['title']){
           
                
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
            return redirect()->route('pages.edit',[
                'page'=>$id
            ])
            ->withErrors($validator)
            ->withInput();
        }


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $upload = $request->file('image')->store('portifolio');
            $article->cover  = $upload;
        }
            $article->title  = $data['title'];
            $article->body  = $data['body'];
            $article->save();
    }
        return redirect()->route('articles.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminatse\Http\Response
     */
    public function destroy($id)
    {
            $page = article::find($id);
            $page->delete();   
        return redirect()->route('articles.index')->withSuccess("Excluido Com Successo");
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\article;
use App\Models\categoria;
use App\Service\ArticleService;

class ArticleControllerApi extends Controller
{
    private $service;
    
    public function __construct(ArticleService $articleService)
    {
        //$this->middleware('auth');    
        $this->service = $articleService;
    }


    public function index()
    {
        $articles = $this->service->paginate(15)->get();    
        return ArticleResource::collection($articles); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        return $this->service->create($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($result = $this->service->findById($id)){
            return new ArticleResource($result);
        }
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
        
        if ($article) {
            $data = $request->only([
                'title',
                'body',              
            ]);

            if ($article['title'] !== $data['title']) {           
                $validator = Validator::make($data,[
                    'title'=> ['required', 'string', 'max:100'],
                    'body'=> ['string']                    
                ]);
            } else {
                    $validator = Validator::make($data,[
                        'title'=> ['required', 'string', 'max:100'],
                        'body'=> ['string']
                ]);
            }   

            if ($validator->fails()) {
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
        return $this->service->delete($id);
    }
}

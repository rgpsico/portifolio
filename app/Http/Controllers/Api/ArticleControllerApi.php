<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ArticleException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\article;
use App\Models\categoria;
use App\Service\ArticleService;
use Carbon\Carbon;

class ArticleControllerApi extends Controller{
    private $service;
    
    public function __construct(ArticleService $articleService)
    {     
        $this->service = $articleService;
    }


    public function index()
    {
        try {
            $articles = $this->service->listAll();
            return ArticleResource::collection($articles);
        } catch (ArticleException $e) {
            return response()->error("Article não encontrado", 404);
        }
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
        $data = $data['date'] = Carbon::now();
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
        if ($result = $this->service->findById($id)) {
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
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();
        dd($data);
        if (!$article = article::find($id)) {
            return redirect()->back();
        }
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $upload = $request->file('image')->store('portifolio');
            $article->cover  = $upload;
        }

        $result = $this->service->update($data);
        dd($result);
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

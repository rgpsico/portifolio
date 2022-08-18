<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\categoria;
use App\Service\ArticleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private $service;
    private $repository;

    public function __construct(ArticleService $articleService)
    {
        //$this->middleware('auth');
        $this->service = $articleService;
    }

    public function index()
    {
        $articles = $this->service->get();
        $loggedId = intval(Auth::id());
        $categorias = categoria::all();

        return view('Admin.articles.index', [
            'articles' => $articles,
            'categorias ' => $categorias,
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

        return view('Admin.articles.create', [
            'categorias' => $categorias,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $dataAtual = Carbon::now();
        $dataNow = $dataAtual->toDateTimeString();

        $data = $request->all();
        $data['date'] = $dataNow;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name} . {$extension}";

            $upload = $request->image->storeAs('portifolio', $nameFile);
        }

        $criarArtigo = $this->service->create($data);

        return redirect()
            ->route('articles.index')
            ->withSuccess('Cadastrado com Successo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->service->findById($id);

        if ($article) {
            return view('Admin.articles.edit', [
                'article' => $article,
            ]);
        }

        return redirect()->route('articles.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        if (!$article = $this->service->findById($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $upload = $request->file('image')->store('portifolio');
            $article->cover = $upload;
        }

        $article->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminatse\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->service->findById($id);
        $article->delete();

        return redirect()->route('articles.index')->withSuccess('Excluido Com Successo');
    }

    public function search(Request $request)
    {
        //$filters = $request->only('filter');

    //    $articles = $this->service->search($filters);

        //  return view('articles.index', compact('articles', 'filters'));
    }
}

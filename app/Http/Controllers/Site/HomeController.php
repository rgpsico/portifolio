<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\categoria;
use App\Models\cursos;
use App\Models\experiencia;
use App\Models\portifolio;
use App\Models\Setting;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::first(); // Get the first user instead of all users
        $articles = Article::paginate();
        $portifolios = Portifolio::all();
        $experiencias = Experiencia::all();
        $cursos = Cursos::all();
        $servicos = Service::all(); // Assuming a Service model exists
        $settings = Setting::all();
        $categorias = Categoria::all();

        return view('Site.home', [
            'user' => $user, // Single user record
            'articles' => $articles,
            'portifolios' => $portifolios,
            'experiencias' => $experiencias,
            'cursos' => $cursos,
            'servicos' => $servicos,
            'settings' => $settings,
            'categorias' => $categorias,
        ]);
    }

    public function singleBlog($id)
    {
        $articles = article::where('id', $id)->get();

        return view('Site.blog', [
            'articles' => $articles,
        ]);
    }

    public function treino()
    {
        return view('treino.index');
    }

    public function treino01()
    {
        return view('treino.index');
    }
}

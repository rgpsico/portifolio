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
        dd("aaaa");
        $articles = article::paginate();
        $portifolio = portifolio::all();
        $users = User::all();
        $experiencia = experiencia::all();
        $cursos = cursos::all();
        $Setting = Setting::all();
        $categorias = categoria::all();

        return view('Site.home', [
            'articles' => $articles,
            'users' => $users,
            'portifolios' => $portifolio,
            'experiencias' => $experiencia,
            'cursos' => $cursos,
            'settings' => $Setting,
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

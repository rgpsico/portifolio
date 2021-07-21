<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\cursos;
use App\Models\experiencia;
use App\Models\User;
use App\Models\portifolio;
use App\Models\Setting;





use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = article::paginate(10);    
        $portifolio = portifolio::all();        
        $users = User::all();
        $experiencia = experiencia::all();
        $cursos = cursos::all();
        $Setting = Setting::all();
        return view('Site.home',[
            'articles'=>$articles,
            'users'=>$users,
            'portifolios'=>$portifolio,
            'experiencias'=>$experiencia,
            'cursos' =>$cursos,
            'settings'=>$Setting
        
        ]);
    }

    public function singleBlog($id){
        $articles = article::where('id', $id)->get();
        return view('Site.blog',[
            'articles'=>$articles
              
        ]);
    }
}

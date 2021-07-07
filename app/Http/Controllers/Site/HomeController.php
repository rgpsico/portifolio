<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\User;
use App\Models\portifolio;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = article::paginate(10);    
        $portifolio = portifolio::paginate(10);        
        $user = User::where('id',5)->get();
        return view('Site.home',[
            'articles'=>$articles,
            'users'=>$user,
            'portifolios'=>$portifolio
        
        ]);
    }

    public function singleBlog($id){
        $articles = article::where('id', $id)->get();
        return view('Site.blog',[
            'articles'=>$articles
              
        ]);
    }
}

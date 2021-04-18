<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\page;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      
        $visitsCount = 0;
        $onlineCount = 0;
        $pageCount = 0;
        $userCount = 0 ;
        
        
        $interval = intval($request->input('interval',30));
        if($interval > 120){
            $interval = 120;
        }
        $dateInterval = date('Y-m-d H:i:s',strtotime('-'.$interval. 'days'));
        $visitisCount =   Visitor::where('date_access','>=', $dateInterval)->count();


        $dateLimit   = date('Y-m-d H:i:s',strtotime('-5 minutes'));
        $onlineList  = Visitor::select('ip')->where('date_access','>=',$dateLimit)->groupBy('ip')->get();
        $onlineCount = count($onlineList);
        
        //contar paginas
        $pageCount    =    Page::count();
        
        //contar usuarios
        $userCount    =    User::count();
        

        //contage para o pagepie

        $visitsAll = Visitor::selectRaw('page, count(page) as c')
        ->where('date_access','>=', $dateInterval)
        ->groupBy('page')
        ->get();
        
        foreach($visitsAll as $visit){
            $pagePie[ $visit['page'] ] = intval($visit['c']);

        }
               
          $pageLabels = json_encode(array_keys($pagePie));
          $pageValues = json_encode(array_values($pagePie));
        // Coontagem de Paginas


        return view('admin.home',[
            'visitisCount'=>$visitisCount,
            'onlineCount'=>$onlineCount,
            'pageCount'=>$pageCount,
            'userCount'=>$userCount,
            'pageLabels'=>$pageLabels,
            'pageValues'=> $pageValues,
            'dateInterval'=>$interval
        ]);
    }

    
}

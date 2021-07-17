<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;


class SettingController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $settings = [];

        $dbsettings = Setting::get();

        

        return view(
            "Admin.settings.index",
            [
                'settings' => $dbsettings
            ]
        );
    }

    public function save(Request $request){
        $data  = $request->only([
            'title','subtitle','email','bgcolor','textcolor','imagemfundo'
        ]);
        $validador  = $this->validador($data);
       
        if($validador->fails()){
        return redirect()->route('settings')
        ->withErrors($validador);
        
    }

        foreach($data as $item => $value){
            Setting::where('name',$item)
            ->update([
            'content'=> $value
            ]);
        }
        return redirect()->route('settings')
        ->with('warning',"informações alteradas com sucesso");    
        
    }
    
    protected function validador($data){
        return Validator::make($data,[
        'title'=> ['string','max:100'],
        'subtitulo'=> ['string','max:100'],
        'email'=> ['string','max:100'],
        'bgcolor'=> ['string','regex:/#[a-zA-Z0-9]{6}/i'],
        'textcolor'=> ['string','regex:/#[a-zA-Z0-9]{6}/i'],
        ]);
    }
}

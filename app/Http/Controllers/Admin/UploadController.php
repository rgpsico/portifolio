<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\article;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    private $article;

    public function __construct(article $article )
    {
        $this->article = $article;
    }
    public function imageupload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png'
        ]);
        
        $ext = $request->file->extension();
        $imageName = time().'.'.$ext;

        $request->file->move(\public_path('media/images'),$imageName);
        return [
            'location' => asset('media/images/'.$imageName)
        ];

    }

    public function teste(Request $request)
    {   
        $tabela = $request->tabela;
        $campo =  $request->campo;
        $order =  $request->ordem;
          
        if(!$tabela) {
            return response('informe a tabela por favor');
        }

         return  DB::table($tabela)              
                ->orderBy($campo, $order)            
                ->get();    
           
    }
}

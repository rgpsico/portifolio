<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Models\article;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

    public function teste(UploadRequest $request, $cep)
    {        
        if (!$this->cepValidate($cep)) {
            return "não foi";
        }
        return "foi";

    }

    public function cepValidate($cep)
    {

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json");
        $result = $this->data = json_decode($response->getBody()->getContents());  
     
        if (isset($result->cep)) {
            return true;
        }    
    }
}

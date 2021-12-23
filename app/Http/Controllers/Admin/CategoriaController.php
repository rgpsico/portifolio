<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = categoria::paginate(10);
        $loggedId = intval(Auth::id());

        return view('Admin.categoria.index', [
          'categorias'=>$categorias
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryUpdateRequest $request)
    {
        $data = $request->all();
        dd($data);

        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = categoria::find($id);
        if ($categoria) {
            return view('Admin.categoria.edit', [
                'categoria'=>$categoria
            ]);
        }
        return redirect()->route('categoria.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = categoria::find($id);
        
        if ($page) {
            $data = $request->only([
                'title',
                'body',
            ]);
            if ($page['title'] !== $data['title']) {
                $validator = Validator::make($data, [
                    'title'=>['required','string','max:100'],
                    'body'=> ['string']
                    
                ]);
            } else {
                $validator = Validator::make($data, [
                    'title'=>['required','string','max:100'],
                    'body'=> ['string']
                ]);
            }
            if ($validator->fails()) {
                return redirect()->route('categoria.edit', [
                'categoria'=>$id
            ])
            ->withErrors($validator)
            ->withInput();
            }
            $page->title  = $data['title'];
            $page->body  = $data['body'];

       
       

            $page->save();
        }
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = categoria::find($id);
        $page->delete();
        return redirect()->route('categoria.index');
    }
}

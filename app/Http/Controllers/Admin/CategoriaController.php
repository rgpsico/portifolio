<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\categoria;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoriaController extends Controller
{
    private $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = $this->repository->paginate(10);
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
        if ($this->repository->create($data)) {
            return redirect()->route('categoria.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->repository->findById($id)) {
            return redirect()->route('categoria.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = $this->repository->findById($id);

        if ($categoria) {
            return view(
                'Admin.categoria.edit',
                compact('categoria')
            );
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
    public function update(CategoryUpdateRequest $request, $id)
    {
        if (!$categoria = $this->repository->findById($id)) {
            return redirect()->back();
        }
        
        $categoria->update($request->all());
        
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
        if (!$categoria = $this->repository->findById($id)) {
            return redirect()->back();
        }
        
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}

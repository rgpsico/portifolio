<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\article;
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
        $userCount = 0;


        $interval = intval($request->input('interval', 30));
        if ($interval > 120) {
            $interval = 120;
        }
        $dateInterval = date('Y-m-d H:i:s', strtotime('-' . $interval . 'days'));
        $visitisCount =   Visitor::where('date_access', '>=', $dateInterval)->count();


        $dateLimit   = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineList  = Visitor::select('ip')->where('date_access', '>=', $dateLimit)->groupBy('ip')->get();
        $onlineCount = count($onlineList);

        //contar paginas
        $pageCount    =    Page::count();

        //contar usuarios
        $userCount    =    User::count();


        //contage para o pagepie

        $visitsAll = Visitor::selectRaw('page, count(page) as c')
            ->where('date_access', '>=', $dateInterval)
            ->groupBy('page')
            ->get();


        foreach ($visitsAll as $visit) 
        {
            $pagePie[$visit['page']] = intval($visit['c']);
        }

        // Coontagem de Paginas

        return view('Admin.home', [
            'visitisCount' => $visitisCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            //  'pageLabels'=>$pageLabels,
            // 'pageValues'=> $pageValues,
            'dateInterval' => $interval
        ]);
    }

    public function home()
    {
        $articles = article::paginate(10);
        return view('Admin.home.index', ['home' => $articles]);
    }

    public function create()
    {
        $categorias = article::all();
        return view('Admin.home.create', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'body',
            'image',
            'categoria'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['string'],
            'categoria' => ['string', 'max:100']
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('portifolio', $nameFile);
        }

        if ($validator->fails()) {
            return redirect()->route('articles.create')
                ->withErrors($validator)
                ->withInput();
        }
        $Page = new article;
        $Page->title =  $data['title'];
        $Page->body = $data['body'];
        $Page->categoria  = $data['categoria'];
        $Page->cover  = $nameFile;
        $Page->save();

        return redirect()->route('articles.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = article::find($id);
        if ($page) {
            return view('admin.articles.edit', [
                'article' => $page
            ]);
        }
        return redirect()->route('articles.index');
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
        $page = article::find($id);

        if ($page) {
            $data = $request->only([
                'title',
                'body',
            ]);
            if ($page['title'] !== $data['title']) {


                $validator = Validator::make($data, [
                    'title' => ['required', 'string', 'max:100'],
                    'body' => ['string']

                ]);
            } else {
                $validator = Validator::make($data, [
                    'title' => ['required', 'string', 'max:100'],
                    'body' => ['string']
                ]);
            }
            if ($validator->fails()) {
                return redirect()->route('pages.edit', [
                    'page' => $id
                ])
                    ->withErrors($validator)
                    ->withInput();
            }
            $page->title  = $data['title'];
            $page->body  = $data['body'];




            $page->save();
        }
        return redirect()->route('articles.index');
    }


    public function destroy($id)
    {
        $page = article::find($id);
        $page->delete();
        return redirect()->route('pages.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Pages\PagesRepository;

class PagesController extends Controller
{

    private $pagesRepository;
    public function __construct()
    {
        $this->pagesRepository = app(PagesRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagesList = $this->pagesRepository->getPages();
        return view('page.pages', ['pages' => $pagesList]);
        //dd($pagesList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.pageAdd');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'date' => $request->input('date'),
            'color' => $request->input('color'),
            'code' => $request->input('code')
        );
        $this->pagesRepository->addPage($data);
        return redirect()->route('pagesList');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $page = $this->pagesRepository->getPage($id);
        //dd($product);
        if(count($page) > 0){
            return view('page.page', ['page' => $page[0]]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $page = $this->pagesRepository->getPage($id);
        if (count($page) > 0) {
            return view('page.pageEdit', ['id' => $id, 'page' => $page[0]]);
        }
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
        $data = array(
            'name'  => $request->input('name'),
            'link'  => $request->input('link'),
            'date'  => $request->input('date'),
            'date'  => $request->input('date'),
            'color' => $request->input('color'),
            'code'  => $request->input('code')
        );
        $pageId = (int) $request->input('id');
        $this->pagesRepository->updatePage($data, $pageId);
        return redirect()->route('pagesList'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $pageId = (int)$request->input('id');
        $this->pagesRepository->deletePage($pageId);
        return redirect()->route('pagesList'); 
    }
}

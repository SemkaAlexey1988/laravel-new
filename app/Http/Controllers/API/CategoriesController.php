<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;

use App\Repositories\Categories\CategoriesRepository;

class CategoriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $categoriesRepository;
    public function __construct()
    {
        $this->categoriesRepository = app(CategoriesRepository::class);
    } 
        
    public function index()
    {
        $categoriesList = $this->categoriesRepository->getCategories();
        return $this->sendResponse($categoriesList->toArray(), 'Categories retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'parent_id' => $request->input('parent_id')
        );
        $this->categoriesRepository->addCategory($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoriesRepository->getCategory($id);
        if(count($category) > 0){
            return $this->sendResponse($category->toArray(), 'Category retrieved successfully.');
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
        //
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
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id')
        );
        $categoryId = (int) $request->input('id');
        $this->categoriesRepository->updateCategory($data, $categoryId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $categoryId = (int)$request->input('id');
        $this->categoriesRepository->deleteCategory($categoryId);
    }
}

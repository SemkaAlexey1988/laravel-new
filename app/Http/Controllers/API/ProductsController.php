<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductsRepository;
use App\Repositories\Products\ProductsToCategoryRepository;
use App\Http\Controllers\API\BaseController as BaseController;

class ProductsController extends BaseController
{
    private $productsRepository;
    private $productsToCategoryRepository;
    public function __construct()
    {
        $this->productsRepository = app(ProductsRepository::class);
        $this->productsToCategoryRepository = app(ProductsToCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsList = $this->productsRepository->getProducts();
        return $this->sendResponse($productsList->toArray(), 'Products retrieved successfully.');
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
            'price' => $request->input('price')
        );
        $this->productsRepository->addProduct($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productsRepository->getProduct($id);
        if(count($product) > 0){
            return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');
        }
    }
    public function showByCategory($id)
    {
        $productsIds = $this->productsToCategoryRepository->getProductsIdsByCategory($id);
        $idList = array();
        foreach($productsIds as $key => $ids){
            array_push($idList, $key);
        }
        $productsList = $this->productsRepository->getProductsByIds($idList);
        if(count($productsList) > 0){
            return $this->sendResponse($productsList->toArray(), 'Product by category retrieved successfully.');
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
            'price' => $request->input('price')
        );
        $productId = (int) $request->input('id');
        $this->productsRepository->updateProduct($data, $productId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $productId = (int)$request->input('id');
        $this->productsRepository->deleteProduct($productId);
    }
}

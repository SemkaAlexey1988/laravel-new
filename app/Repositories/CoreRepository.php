<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

use Exception;

abstract class CoreRepository {

  /**
         * Illuminate\Database\Eloquent\Model;
         * @var Model
         */

    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

     /**
         * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions(){
        return clone $this->model;
    }

    protected function getConnectionName(){
      return $this->startConditions()->getConnectionName();
    }

    protected function getTableName(){
      return $this->startConditions()->getTable();
    }

    public function getId($id){
        return $this->startConditions()->find($id);
    }

    public function getRequestID($get = true, $id = 'id')
    {
        if($get){
          $data = $_GET;
        }else{
          $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;

        if(!$id){
          throw new Exception('Check id', 404);
        }

        return $id;
    }

}

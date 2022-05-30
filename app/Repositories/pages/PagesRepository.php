<?php

namespace App\Repositories\Pages;

use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Pages as Model;


class PagesRepository extends CoreRepository 
{
    public function __construct()
    {
        parent::__construct();   
    }
    
    protected function getModelClass()
    {
        return Model::class;   
    }

    public function getPages()
    {
        $pages = $this->startConditions()->select('*')
        ->get()->keyBy('id');
        return $pages; 
    }
    public function getPagesByIds( $ids )
    {
        $pages = $this->startConditions()->select('*')
        ->whereIn('id', $ids)
        ->get()->keyBy('id')->unique();
        return $pages; 
    }
    public function getPage( $id )
    {
        $page = $this->startConditions()->select('*')
        ->where('id', '=' , $id)
        ->get();
        return $page; 
    }
    public function updatePage( $data, $id )
    {
        $this->startConditions()->where('id', $id)->update($data);
    }
    public function addPage( $data )
    {
        $id = DB::connection($this->getConnectionName())->table($this->getTableName())->insertGetId([
            'name'  => $data['name'], 
            'link'  => $data['link'],  
            'date'  => $data['date'],  
            'color' => $data['color'], 
            'code'  => $data['code'] 
        ]);
            return $id;
    }
    public function deletePage( $id )
    {
        DB::connection($this->getConnectionName())->table($this->getTableName())
        ->where('id', $id)
        ->delete();
    } 

}

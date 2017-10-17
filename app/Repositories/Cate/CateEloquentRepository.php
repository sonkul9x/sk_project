<?php
namespace App\Repositories\Cate;

use App\Repositories\EloquentRepository;

class CateEloquentRepository extends EloquentRepository implements CateRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Cate::class;
    }    
    public function deletenotParent($id)
    {
    	$parent = $this->_model->where('parent_id',$id)->count();
    	if($parent == 0){
    		// KIEM TRA CO CAT CON
    		$category = $this->find($id);
    		$category->delete();
    		return true;
    	}else{
    		return false;
    	}
    }
}
<?php
namespace App\Repositories\Page;

use App\Repositories\EloquentRepository;

class PageEloquentRepository extends EloquentRepository implements PageRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Page::class;
    }   
  

}
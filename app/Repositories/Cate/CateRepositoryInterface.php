<?php
namespace App\Repositories\Cate;

interface CateRepositoryInterface
{
	public function getAllCat();	
    public function deletenotParent($id);  
}
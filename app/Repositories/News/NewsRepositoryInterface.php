<?php
namespace App\Repositories\News;

interface NewsRepositoryInterface
{
    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished();

    /**
     * Get post only published
     * @return mixed
     */
    public function findOnlyPublished($id);

    public function getAllNew();
    /**
     * Get All Join
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    // public function getAllJoin(); 

    // public  function _ImageUpload($file,$fImageCurrent='');
    
    // public function _deleteImage($id);

}
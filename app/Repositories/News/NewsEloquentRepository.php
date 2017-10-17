<?php
namespace App\Repositories\News;

use App\Repositories\EloquentRepository;
use Image,File;

class NewsEloquentRepository extends EloquentRepository implements NewsRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\News::class;
    }

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished()
    {
        $result = $this->_model->where('status', 1)->get();
        return $result;
    }

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function findOnlyPublished($id)
    {
        $result = $this
            ->_model
            ->where('id', $id)
            ->where('status', 1)
            ->first();

        return $result;
    }
     /**
     * Get All Join
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    // public function getAllJoin()
    // {
    //     return $this->_model->select('*')->paginate(config('constants.NEW_IN_PAGE'));
    // }
    // public function _ImageUpload($file,$fImageCurrent='')
    // {
    //     if(strlen($file)){
    //         if($fImageCurrent){
    //         if(file_exists(public_path().'/uploads/news/'.$fImageCurrent)){
    //                 File::delete(public_path().'/uploads/news/'.$fImageCurrent);
    //                 File::delete(public_path().'/uploads/news/thumbnails/'.$fImageCurrent);
    //                //C2:  unlink(public_path().'/uploads/news/'.$new->image);
    //             }
    //         }
    //         $filename = time().'.'.$file->getClientOriginalName();
    //         $destinationPath = public_path('/uploads/news');
    //         $thumbPath = public_path('/uploads/news/thumbnails');

    //         $file->move($destinationPath,$filename);
    //         $img = Image::make($destinationPath.'/'.$filename);
    //         $img->resize(100, 100)->save($thumbPath.'/'.$filename);
    //         return $filename;
    //     }    

    // }
    // public function _deleteImage($id)
    // {
    //     $image = $this->_model->find($id);
    //     if(file_exists(public_path().'/uploads/news/'.$image->image)){
    //         File::delete(public_path().'/uploads/news/'.$image->image);
    //         File::delete(public_path().'/uploads/news/thumbnails/'.$image->image);                   
    //     }
    //     return true;
    // }

}
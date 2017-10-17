<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Cate\CateRepositoryInterface;
use App\Http\Requests\NewAddRequest;
use App\Http\Requests\NewEditRequest;
use Image,Auth,DateTime;

class NewsController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $_NewsRepository;
    protected $_CateRepository;

    public function __construct(NewsRepositoryInterface $NewsRepository,CateRepositoryInterface $CateRepository)
    {
        $this->_NewsRepository = $NewsRepository;
        $this->_CateRepository = $CateRepository;    
    }
    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->_NewsRepository->getAllNew();
        return view('admin.modules.news.list', compact('news'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = $this->_CateRepository->getAllCat();
        return view('admin.modules.news.add',['cate' => $cate]);
    }

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(NewAddRequest $request)
    {
        $data = array();
        /*
        Upload image end Resize Image Thủ công
         */
        // $file = $request->file('newsImg');
        
        // $nameimage = $this->_NewsRepository->_ImageUpload($file);
        // if(!empty($nameimage)){
        //     $data['image'] = $nameimage;
        // }
         /*
        Dùng Pakage Larave File Manager
         */
        $img = $request->newsImg;
        $name_image = explode('/', $img);     
        
        $data['image'] = end($name_image);
        $data['title'] = $request->txtTitle ;
        $data['slug']  = str_slug($request->txtTitle,"-");
        $data['intro']  =  $request->txtIntro;
        $data['content'] = $request->txtFull;
        $data['status']  = $request->rdoPublic;
        $data['category_id'] = $request->sltCate;
        $data['meta_description'] = $request->meta_description;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['user_id'] = Auth::user()->id;
        $data['created_at']  = new DateTime;
        $this->_NewsRepository->create($data);
        return redirect()->route('getNewList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Add New Sussess!']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Cate = $this->_CateRepository->getAllCat();
        $data = $this->_NewsRepository->find($id);
        return view('admin.modules.news.edit',['data' => $data,'Cate' => $Cate]);
    }
    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update(NewEditRequest $request, $id)
    {
        $data = array();
        /*
        Upload image end Resize Image
         */
        // $file = $request->file('newsImg');        
        // $nameimage = $this->_NewsRepository->_ImageUpload($file,$request->fImageCurrent);
        // if(!empty($nameimage)){
        //     $data['image'] = $nameimage;
        // }
         /*
        Dùng Pakage Larave File Manager
         */
        $img = $request->newsImg;
        if($img){
           $name_images = explode('/', $img);
           $name_image = end($name_images);
        }else{
            $name_image = $request->fImageCurrent;
        }
             

        $data['image'] = $name_image;
        $data['title'] = $request->txtTitle ;
        $data['slug']  = str_slug($request->txtTitle,"-");
        $data['intro']  =  $request->txtIntro;
        $data['content'] = $request->txtFull;
        $data['status']  = $request->rdoPublic;
        $data['category_id'] = $request->sltCate;
        $data['meta_description'] = $request->meta_description;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['user_id'] = Auth::user()->id;
        $data['updated_at']  = new DateTime;
        $post = $this->_NewsRepository->update($id, $data);
        return redirect()->route('getNewList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Edit New Sussess!']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {               
        $this->_NewsRepository->delete($id);
           return redirect()->route('getNewList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Delete New Sussess!']);
    }
}
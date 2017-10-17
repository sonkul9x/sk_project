<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepositoryInterface;
use App\Http\Requests\PageAddRequest;
use App\Http\Requests\PageEditRequest;
use Auth,DateTime;

class PageController extends Controller
{
	protected $_PageRepository;
    function __construct(PageRepositoryInterface $pageRepository)
    {
    	$this->_PageRepository = $pageRepository;
    }
    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->_PageRepository->getAll();
        return view('admin.modules.page.list', ['pages' => $pages]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.modules.page.add');
    }

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(PageAddRequest $request)
    {
        $data = array();       
        $img = $request->newsImg;
        $name_image = explode('/', $img);     
        
        $data['image'] = end($name_image);
        $data['title'] = $request->txtTitle ;
        $data['slug']  = str_slug($request->txtTitle,"-");
        $data['content'] = $request->txtFull;
        $data['status']  = $request->rdoPublic;
        $data['meta_description'] = $request->meta_description;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['user_id'] = Auth::user()->id;
        $data['created_at']  = new DateTime;
        $this->_PageRepository->create($data);
        return redirect()->route('getPageList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Add Page Sussess!']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->_PageRepository->find($id);
        return view('admin.modules.page.edit',['data' => $data]);
    }
    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update(PageEditRequest $request, $id)
    {
        $data = array();        
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
        $data['content'] = $request->txtFull;
        $data['status']  = $request->rdoPublic;        
        $data['meta_description'] = $request->meta_description;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['user_id'] = Auth::user()->id;
        $data['updated_at']  = new DateTime;
        $post = $this->_PageRepository->update($id, $data);
        return redirect()->route('getPageList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Edit Page Sussess!']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {            
        $this->_PageRepository->delete($id);
        return redirect()->route('getPageList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Delete Page Sussess!']);
    }
}

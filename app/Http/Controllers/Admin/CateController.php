<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Cate\CateRepositoryInterface;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use DateTime;

class CateController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $_CateRepository;

    public function __construct(CateRepositoryInterface $CateRepository)
    {
        $this->_CateRepository = $CateRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = $this->_CateRepository->getAllCat();
        return view('admin.modules.cate.list', ['listCat' => $cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->_CateRepository->getAllCat();
        return view('admin.modules.cate.add',['datacat' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateAddRequest $request)
    {
        $data = array();    
        $data['name']       = $request->txtCateName;
        $data['slug']     = str_slug( $request->txtCateName , '-');
        $data['parent_id']  = $request->sltCate;
        $data['created_at'] = new DateTime();      
        $post = $this->_CateRepository->create($data);
        return redirect()->route('getCatList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Create Category Sussess!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataAll = $this->_CateRepository->getAllCat();
        $data = $this->_CateRepository->find($id);
        return view('admin.modules.cate.edit',['data' => $data,'dataAll' => $dataAll]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateEditRequest $request, $id)
    {
        $data = array();    
        $data['name']      = $request->txtCateName;
        $data['slug']       = str_slug( $request->txtCateName , '-');
        $data['parent_id']  = $request->sltCate;
        $data['updated_at'] = new DateTime();
        $this->_CateRepository->update($id, $data);
        return redirect()->route('getCatList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Update Category Sussess!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->_CateRepository->deletenotParent($id);
        if($result == false){
            echo '<script type="text/javascript">alert("Error: Not Delete!")
            window.location = "';
            echo route('getCatList');
            echo '"</script>';
        }else{
            return redirect()->route('getCatList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Delete Category Sussess']);
        }
       
    }
}

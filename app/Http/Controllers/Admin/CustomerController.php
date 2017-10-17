<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Mail;
use App\Mail\SendCustomer;

class CustomerController extends Controller
{
    protected $_CustomerRepository;
    function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->_CustomerRepository = $CustomerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->_CustomerRepository->getAll();        
        return view('admin.modules.customer.list',['data' => $data]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->ajax()){
            $id = $request->id;
            $html = "";
            $customer = $this->_CustomerRepository->find($id);
            $html .='<div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Infomation Customer</h4>
              </div>
              <div class="modal-body">
                <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Fullname</th>
                            <th>'.$customer->fullname.'</th>                            
                          </tr>
                        </thead>
                        <tr>
                            <td>Username</td>
                            <td>'.$customer->username.'</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>'.$customer->phone.'</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>'.$customer->email.'</td>
                        </tr>
                        <tr>
                            <td>Point</td>
                            <td>'.$customer->point.'</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>'.$customer->address.'</td>
                        </tr>                    
                </table>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-sk" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>';
        };
        die(json_encode($html));
    }

    public function getCustomerSend($id)
    {
        $customer = $this->_CustomerRepository->find($id);
        return view('admin.modules.customer.send',['customer' => $customer]); 
       // Mail::to($request->user())->send(new OrderShipped($order));
    }
    public function postCustomerSend(Request $request)
    {
        $data = $request->all();
        $content = [
            'title'=> $data['txtTitle'], 
            'body'=>  htmlspecialchars($data['txtFull'])
            ];
        $receiverAddress = $data['email']; 
        Mail::to($receiverAddress)->send(new SendCustomer($content));
        return redirect()->route('getCustomerList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Send Email Customer Sussess!']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_CustomerRepository->delete($id);
        return redirect()->route('getCustomerList')->with(['flash_level' => 'alert-success','flash_mesage' => 'Delete Customer Sussess!']);
    }
}

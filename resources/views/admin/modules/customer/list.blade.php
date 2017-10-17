@extends('admin.app')
@section('title','List Customer')
@section('content')
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List Customers</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> List Customers           
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>                    
                    <th>#</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Phone</th>
                    <th>Points</th>
                    <th class="text-center">Controls</th>
                </tr>
              </thead>              
              <tbody>
                 @if($data)
                    @foreach($data as $item)
                        <tr>
                            <th scope="row">CT - {!! $item->id  !!}</th>
                            <td><a class="ShowCustomer" for="{!! $item->id !!}" href="#" data-base="{!! route('getCustomerShow',['id' => $item->id]) !!}" >{!! $item->username !!}</a></td>
                            <td>{!! $item->email !!}</td>
                            <td>{!! $item->phone !!}</td>
                            <td>{!! $item->point !!}</b></td>
                            <td class="text-center tb_control">
                                 <a  class="btn btn-primary" role="button" href="{!! route('getCustomerSend',['id' => $item->id]) !!}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                               <!--  <a class="edit" href="{!! route('getUserEdit',['id' => $item->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                <a  class="btn btn-danger" role="button" href="{!! route('getCustomerDel',['id' => $item->id]) !!}" onclick="return xacnhanxoa('Are you sure ?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif        
              </tbody>
            </table>
            <div class="sk_pagi">
                        {{ $data->links() }}                    
            </div>
             
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">          
        </div>        
      </div>
@endsection

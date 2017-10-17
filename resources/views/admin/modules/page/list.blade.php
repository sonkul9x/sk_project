@extends('admin.app')
@section('title','List Page')
@section('content')   
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pages List</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> List Pages
            <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getPageAdd') !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Page</a>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th width="50%">Title</th>
                    <th class="text-center">Users</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Status</th>
                    <th class="tb_center">Controls</th>               
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th style="width: 30px;">#</th>
                    <th width="50%">Title</th>
                    <th class="text-center">Users</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Controls</th>   
                </tr>
              </tfoot>
              <tbody>
                @if($pages)                    
                    @foreach($pages as $item)   
                        <tr>
                            <th scope="row">{!! $item['id'] !!}</th>
                            <td>{!! $item['title'] !!}</td>
                            <td  class="text-center">{{ $item['user']['fullname'] }}</td>
                            <td class="text-center"><?php \Carbon\Carbon::setlocale('en'); ?>
                {!! \Carbon\Carbon::CreateFromTimeStamp(strtotime($item['created_at']))->diffForHumans() !!}</td>                
                            <td  class="text-center">@if($item['status'] == 1)
                        <img src="{!! asset('public/admin/images/public.png') !!}" alt="active">
                    @else
                         <img src="{!! asset('public/admin/images/private.png') !!}" alt="Drault">
                    @endif</td>
                            <td class="text-center tb_control">
                                <a  class="btn btn-primary" role="button" href="{!! route('getPageEdit',['id' => $item['id']]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                               <a class="btn btn-danger" role="button" href="{!! route('getPageDel',['id' => $item['id']]) !!}" onclick="return xacnhanxoa('Are you sure ?')"><i class="fa fa-times"  aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif                  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection
@section('script')
<!-- Custom scripts for this page-->
<script src="{!! asset('public/admin') !!}/js/sb-admin-datatables.min.js"></script>
@endsection

@extends('admin.app')
@section('title','User Groups')
@section('content')
   
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{!! route('dashboard') !!}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List Groups Users</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> List Groups Users
            <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getGroupAdd') !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add
                    Groups Users</a>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Name</th>
                    <th class="text-center"  style="width: 100px;">Controls</th>
                </tr>
              </thead>
              <tfoot>
               <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Controls</th>
                </tr>
              </tfoot>
              <tbody>
                 @if($data)
                    @foreach($data as $item)
                        <tr>
                            <th scope="row">{{ $item['id'] }}</th>
                            <td>{!! $item['name'] !!}</td>
                            <td class="tb_center tb_control">
                                <a  class="btn btn-primary" role="button" href="{!! route('getGroupEdit',['id' => $item['id']]) !!}"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a  class="btn btn-danger" role="button" href="{!! route('getGroupDel',['id' => $item['id']]) !!}"
                                   onclick="return xacnhanxoa('Are you sure ?')"><i class="fa fa-times"
                                                                                    aria-hidden="true"></i></a>
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
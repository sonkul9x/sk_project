
@extends('admin.app')
@section('title','List Roles')
@section('content')
   
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User List</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> List Permistion Users ( <span class="small" style="color: #f00;">Contact Developer</span> )
            <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getPerAdd') !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Permistion Users</a>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Routes</th>
                    <th class="text-center">Controls</th>              
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">Name</th>
                    <th class="text-center">Routes</th>
                    <th class="text-center">Controls</th>          
                </tr>
              </tfoot>
              <tbody>
                  @if($data)
                    {{ listPer($data) }}
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection
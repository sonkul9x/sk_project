@extends('admin.app')
@section('title','List Category')
@section('content')   
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List Category</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> List Category
            <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getCatAdd') !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Category</a>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th class="text-center" width="80%">Name</th>                   
                    <th class="text-center" width="20%">Controls</th>               
                </tr>
              </thead>              
              <tbody>
                  @if($listCat)
                        {{ listCat($listCat) }}
                    @endif               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection
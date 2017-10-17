
@extends('admin.app')
@section('title','File Manager')
@section('content')   
    <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{!! route('dashboard') !!}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">File Image Manager</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">       
      <div class="col-12">        
        <div class="card-body">
          <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>     
     
@endsection




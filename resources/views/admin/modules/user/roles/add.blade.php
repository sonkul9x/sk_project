
@extends('admin.app')
@section('title','Add Permistion')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Permistion</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Add Permistion (<span class="small" style="color: #f00;">Add by Developer</span>)
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getUserPer') !!}"><i class="fa fa-list" aria-hidden="true"></i> List Permistion</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
  <form class="form-horizontal sk_form" method="post">
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" required name="txtname" value="{!! old('txtname') !!}"
                           placeholder="Name">
                        <span class="error text-danger"> <?php if ($errors->has('txtname'))
                                echo $errors->first('txtname');
                            ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="fullname" class="col-sm-2 control-label">Name Route</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" required name="txtroute" value="{!! old('txtroute') !!}"
                           id="route" placeholder="Route">
                        <span class="error text-danger"> <?php if ($errors->has('txtroute'))
                                echo $errors->first('txtroute');
                            ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Group Permistion</label>
                <div class="col-sm-10">
                    <select class="form-control" name="selGroup">
                        <option value=""> Root</option>
                        @if($group)
                            @foreach($group as $item_gr)
                                <option value="{!! $item_gr['id'] !!}">
                                    {!! $item_gr['name'] !!}</option>
                            @endforeach
                        @endif
                    </select>
                        <span class="error text-danger"> <?php if ($errors->has('selGroup'))
                                echo $errors->first('selGroup');
                            ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" role="button" value="Add Permistion">
                </div>
            </div>
        </form>
</div>
@endsection
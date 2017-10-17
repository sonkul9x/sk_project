@extends('admin.app')
@section('title','Edit Users')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Permistion</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Edit Permistion (<span class="small" style="color: #f00;">Add by Developer</span>)
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getUserPer') !!}"><i class="fa fa-list" aria-hidden="true"></i> List Permistion</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
  @if($data)
                <form class="form-horizontal sk_form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txtname" required
                                   value="{!! isset($data['name']) ? $data['name'] : old('txtname') !!}"
                                   id="name" placeholder="Name">
                            <span class="error text-danger"> <?php if ($errors->has('txtname'))
                                    echo $errors->first('txtname');
                                ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 control-label">Name Route</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="route" id="route" required
                                   value="{!! isset($data['routes']) ? $data['routes'] : old('route') !!}"
                                   placeholder="Name Route">
                            <span class="error text-danger"> <?php if ($errors->has('route'))
                                    echo $errors->first('route');
                                ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">User Group</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="selGroup">
                                <option value=""><b> Root</b></option>
                                @if($group)
                                    @foreach($group as $item_gr)
                                        <option value="{!! $item_gr['id'] !!}"
                                                @if( $item_gr['id'] == $data['parent_id'])
                                                selected
                                                @endif
                                        >
                                            |-- {!! $item_gr['name'] !!}</option>
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
                            <input type="submit" class="btn btn-primary" role="button" value="Edit">
                        </div>
                    </div>
                </form>
            @endif
</div>
@endsection
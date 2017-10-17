
@extends('admin.app')
@section('title','Edit Groups')
@section('content')

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit User Groups</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Edit Users
   
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getUserGroup') !!}"><i class="fa fa-list" aria-hidden="true"></i> List User Groups</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
      @if($data)
                <form class="form-horizontal sk_form" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="txtname" value="{!! isset($data->name) ? $data->name : old('txtname') !!}"
                               placeholder="Name">
                            <span class="error text-danger"> <?php if ($errors->has('txtname'))
                                    echo $errors->first('txtname');
                                ?></span>
                    </div>
                </div>
                 @if(config('constants.ACTIVE_PER') == 1)
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Permistions</label>
                    <div class="col-sm-10"> 
                    <span class="error text-danger"> <?php if ($errors->has('listper'))
                                    echo $errors->first('listper');
                                ?></span>                      
                            <?php  listPer2($per, $parent = 0,$data->permistion_list); ?>                                    
                    </div>
                </div>
                @endif
                <div class="form-group  row">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" role="button" value="Edit Group">
                    </div>
                </div>
            </form>
            @endif
</div>
    

@endsection
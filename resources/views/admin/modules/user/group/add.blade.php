
@extends('admin.app')
@section('title','Add Groups')
@section('content')

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User List</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Add Groups (<span class="small">Website Developer</span>  )
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getUserGroup') !!}"><i class="fa fa-list" aria-hidden="true"></i> List User Groups</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
     <form class="form-horizontal sk_form" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-6">
                        <input type="text" class="form-control" required name="txtname" value="{!! old('txtname') !!}"
                               placeholder="Name">
                            <span class="error text-danger"> <?php if ($errors->has('txtname'))
                                    echo $errors->first('txtname');
                                ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Permistions</label>
                    <div class="col-sm-10"> 
                    <span class="error text-danger"> <?php if ($errors->has('listper'))
                                    echo $errors->first('listper');
                                ?></span>                      
                        <?php listPer2($per,$parent = 0,$data_old=""); ?>                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" role="button" value="Add Group">
                    </div>
                </div>
            </form>
</div>
    

@endsection
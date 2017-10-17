@extends('admin.app')
@section('title','Add Users')
@section('content')

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Add Users
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getUserList') !!}"><i class="fa fa-list" aria-hidden="true"></i> List User</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
      <form class="form-horizontal sk_form" method="post">
                {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtusername" value="{!! old('txtusername') !!}" placeholder="Username">
                            <span class="small error text-danger"> <?php if ($errors->has('txtusername')) 
                                echo $errors->first('txtusername');
                            ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-2 control-label">Fullname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtFullname" value="{!! old('txtFullname') !!}" id="fullname" placeholder="fullname">
                            <span class="small error text-danger"> <?php if ($errors->has('txtFullname')) 
                                echo $errors->first('txtFullname');
                            ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 control-label">email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtEmail" id="email"  value="{!! old('txtEmail') !!}"  placeholder="Email">
                            <span class="small error text-danger"> <?php if ($errors->has('txtEmail')) 
                                echo $errors->first('txtEmail');
                            ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="phone" name="txtPhone"  value="{!! old('txtPhone') !!}"  placeholder="Phone">
                            <span class="small error text-danger"> <?php if ($errors->has('txtPhone')) 
                                echo $errors->first('txtPhone');
                            ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtPass" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="txtPass" id="txtPass" placeholder="Password">
                            <span class="small error text-danger"> <?php if ($errors->has('txtPass')) 
                                echo $errors->first('txtPass');
                            ?></span>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="txtRePass" class="col-sm-2 control-label">Confirm password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="txtRePass" id="txtRePass" placeholder="Password">
                            <span class="small error text-danger"> <?php if ($errors->has('txtRePass')) 
                                echo $errors->first('txtRePass');
                            ?></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label  class="col-sm-2 control-label">User Group</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="selGroup">
                            @foreach($group as $item_gr)
                              <option value="{!! $item_gr->id; !!}"
                                @if($item_gr->id == old('selGroup'))
                                selected
                                @endif
                              >{!! $item_gr->name; !!}</option>
                            @endforeach
                            </select>
                            <span class="small error text-danger"> <?php if ($errors->has('selGroup')) 
                                echo $errors->first('selGroup');
                            ?></span>
                        </div>
                    </div>                 
                    <div class="form-group row">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-primary" role="button" value="Add User">
                        </div>
                    </div>
                </form>
</div>
    

@endsection
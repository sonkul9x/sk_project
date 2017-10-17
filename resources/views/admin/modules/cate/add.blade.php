@extends('admin.app')
@section('title','Add Category')
@section('content')

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Category</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Add Category
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getCatList') !!}"><i class="fa fa-list" aria-hidden="true"></i> List Category</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
      <form class="form-horizontal sk_form" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Category Parent</label>
                    <div class="col-sm-10">
                        <select name="sltCate"  class="form-control">
                        <option value="0">--- ROOT ---</option>
                        <?php menuMulti($datacat,0,$str='---|',old('sltCate')); ?>
                    </select>
                            <span class="error text-danger"> <?php if ($errors->has('sltCate'))
                                    echo $errors->first('sltCate');
                                ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Name Category</label>
                    <div class="col-sm-10"> 
                        <input type="text" name="txtCateName"  class="form-control" value="{!! old('txtCateName') !!}" />
                    <span class="error text-danger"> <?php if ($errors->has('txtCateName'))
                                    echo $errors->first('txtCateName');
                                ?></span>                      
                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" role="button" value="Add Category">
                    </div>
                </div>
            </form>
</div>
    

@endsection
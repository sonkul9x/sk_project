@extends('admin.app')
@section('title','Send Mail')
@section('content')
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List Customers</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> Send Mail to Customer         
      </div>
        <div class="card-body">
          <form class="form-horizontal sk_form" action="" method="POST" enctype="multipart/form-data">            
                {{ csrf_field() }} 
              
                               <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" name="txtTitle" value="{!! old('txtTitle') !!}" />
                        <span class="error text-danger"> <?php if ($errors->has('txtTitle')) echo $errors->first('txtTitle'); ?></span>     
                    </div>
                </div>                
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">To</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" readonly="readonly" name="email" value="{!! old('email', isset($customer['email']) ? $customer['email'] : null ) !!}" />
                        <span class="error text-danger"> <?php if ($errors->has('email')) echo $errors->first('email'); ?></span>     
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10"> 
                        <textarea name="txtFull" class="form-control" rows="8" >{!! old('txtFull') !!}</textarea>                    
                        <span class="error text-danger"> <?php if ($errors->has('txtFull')) echo $errors->first('txtFull'); ?></span>     
                    </div>
                </div>                       
                        <div class="form-group row">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" name="btnNewsAdd" class="button btn btn-primary" role="button" />
                    </div>
                </div>
            </form>
        </div>              
      </div>
@endsection
@section('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{!! asset('public/src/js/vendor/tinymce/js/tinymce/tinymce.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('public/src/js/vendor/tinymce/js/tinymce/jquery.tinymce.min.js') !!}"></script>
    <script src="{!! asset('vendor/laravel-filemanager/js/lfm.js') !!}"></script>
   <script  type="text/javascript">
  
    var editor_config = {
      path_absolute : "{{ URL::to('/') }}/",
      selector : "textarea",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type = 'image') {
          cmsURL = cmsURL+'&type=Images';
        } else {
          cmsUrl = cmsURL+'&type=Files';
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizeble : 'yes',
          close_previous : 'no'
        });
      }
    };
    tinymce.init(editor_config);   
      </script>﻿   
@endsection
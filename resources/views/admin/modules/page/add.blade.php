@extends('admin.app')
@section('title','Add New')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Page</li>
      </ol>
<div class="card-header">
  <i class="fa fa-table"></i> Add Page
    <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getPageList') !!}"><i class="fa fa-list" aria-hidden="true"></i> List Pages</a>
</div>
<div class="card-body">
    @include('admin.blocks.mes')    
      <form class="form-horizontal sk_form" action="" method="POST" enctype="multipart/form-data">            
                {{ csrf_field() }}    
                 <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
                            <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#general" role="tab"  >General</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" data-toggle="tab" href="#SEO" role="tab" >SEO Setting</a>
                            </li>                           
                        </ul>   
               
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="general">
                               <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" name="txtTitle" class="textbox" value="{!! old('txtTitle') !!}" />
                        <span class="error text-danger"> <?php if ($errors->has('txtTitle')) echo $errors->first('txtTitle'); ?></span>     
                    </div>
                </div>              
                 
                 <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10"> 
                        <textarea name="txtFull" class="form-control" rows="8" class="textbox">{!! old('txtFull') !!}</textarea>                    
                        <span class="error text-danger"> <?php if ($errors->has('txtFull')) echo $errors->first('txtFull'); ?></span>     
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Featured Image</label>
                    <div class="col-sm-10">                         
                      <?php /* <label class="btn btn-primary btn-file">
                            Browse... <input id="imgInp" type="file" name="newsImg" style="display: none;">
                        </label><div  style="margin-top: 10px;"><img id="blah" src="#" /></div>
                        <span class="error text-danger"> <?php  if ($errors->has('newsImg')) echo $errors->first('newsImg'); </span>  */ ?> 
                        <div class="input-group">
                         <span class="input-group-btn">
                           <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" role="button">
                             <i class="fa fa-picture-o"></i> Choose
                           </a>
                         </span>
                         <input id="thumbnail" class="form-control" type="text" name="newsImg">
                       </div>
                       <img id="holder" style="margin-top:15px;max-height:100px;">
                    <span class="error text-danger"> <?php  if ($errors->has('newsImg')) echo $errors->first('newsImg'); ?></span> 
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10"> 
                        <input type="radio" name="rdoPublic" value="1" 
                        @if(old('rdoPublic') == 1)
                        checked="" 
                        @endif
                         /> Public 
                        <input type="radio" name="rdoPublic" value="0" 
                        @if(old('rdoPublic') == 0)
                        checked="" 
                        @endif
                        /> Private
                    </div>
                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="SEO">
                                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-10"> 
                        <textarea class="form-control" rows="5" name="meta_description" class="textbox" />{!! old('meta_description') !!}</textarea>
                        <span class="error text-danger"> <?php if ($errors->has('meta_description')) echo $errors->first('meta_description'); ?></span>     
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 control-label">Meta Keywords</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" name="meta_keywords" class="textbox" value="{!! old('meta_keywords') !!}" />
                        <span class="error text-danger"> <?php if ($errors->has('meta_keywords')) echo $errors->first('meta_keywords'); ?></span>     
                    </div>
                </div>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" name="btnNewsAdd" value="Add Page" class="button btn btn-primary" role="button" />
                    </div>
                </div>
            </form>
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
      <script type="text/javascript"> $('#lfm').filemanager('image');</script>
@endsection
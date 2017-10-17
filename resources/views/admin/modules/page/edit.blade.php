@extends('admin.app')
@section('title','Edit New')
@section('content')
		<main id="main" class="row">
        <div class="head-main">
            <div class="col-lg-6 head-title">
                <h3>Edit New</h3>
                <small>Edit New </small>
            </div>
            <div class="col-lg-6 head-control">
                <a href="{!! route('dashboard') !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Dashboard Controls</a>
                <a href="{!! route('getPageList') !!}"><i class="fa fa-list" aria-hidden="true"></i>Pages List</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content-main">
            @include('admin.blocks.mes')
            <form class="form-horizontal sk_form" action="" method="POST" enctype="multipart/form-data">            
                {{ csrf_field() }}                 
                                
               
                <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
                            <li role="presentation" class="active"><a href="#general" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
                            <li role="presentation"><a href="#SEO" aria-controls="profile" role="tab" data-toggle="tab">SEO Setting</a></li>                           
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="general">
                               <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" name="txtTitle" class="textbox" value="{!! old('txtTitle', isset($data['title']) ? $data['title'] : null ) !!}" />
                        <span class="error text-danger"> <?php if ($errors->has('txtTitle')) echo $errors->first('txtTitle'); ?></span>     
                    </div>
                </div>                 
                 <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10"> 
                        <textarea name="txtFull" class="form-control" rows="8" class="textbox">{!! old('txtFull', isset($data['content']) ? $data['content'] : null ) !!}</textarea>                    
                        <span class="error text-danger"> <?php if ($errors->has('txtFull')) echo $errors->first('txtFull'); ?></span>     
                    </div>
                </div>
                 <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Featured Image</label>
                    <div class="col-sm-10">                      
                       
                        <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-sk">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
   <input id="thumbnail" class="form-control" type="text" name="newsImg">
    <input type="hidden" value="{!! $data['image'] !!}" name="fImageCurrent">
 </div>
 <img id="holder" style="margin-top:15px;max-height:100px;" src="{!! isset($data['image']) ? asset('public/uploads/images/shares/thumbs/'.$data['image']) : asset('public/admin/images/nophoto.png') !!}">

                        <span class="error text-danger"> <?php if ($errors->has('newsImg')) echo $errors->first('newsImg'); ?></span>     
                    </div>
                </div>
                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10"> 
                        <input type="radio" name="rdoPublic" value="1" 
						@if($data['status'] == 1)
						checked="" 
						@endif
						 /> Public 
						<input type="radio" name="rdoPublic" value="0" 
						@if($data['status'] == 0)
						checked="" 
						@endif		
						/> Drault
                    </div>
                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="SEO">
                                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-10"> 
                        <textarea class="form-control" rows="5" name="meta_description" class="textbox" />{!! old('meta_description', isset($data['meta_description']) ? $data['meta_description'] : null ) !!}</textarea>
                        <span class="error text-danger"> <?php if ($errors->has('meta_description')) echo $errors->first('meta_description'); ?></span>     
                    </div>
                </div>
                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Meta Keywords</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" name="meta_keywords" class="textbox" value="{!! old('meta_keywords', isset($data['meta_keywords']) ? $data['meta_keywords'] : null ) !!}" />
                        <span class="error text-danger"> <?php if ($errors->has('meta_keywords')) echo $errors->first('meta_keywords'); ?></span>     
                    </div>
                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" name="btnNewsEdit" value="Edit New" class="button btn btn-sk" />
                    </div>
                </div>
            </form>

        </div>
    </main>
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

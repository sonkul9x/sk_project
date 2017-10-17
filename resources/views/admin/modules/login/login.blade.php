
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{!! __('auth.login') !!}</title>
  <!-- Bootstrap core CSS-->
  <link href="{!! asset('public/admin') !!}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{!! asset('public/admin') !!}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{!! asset('public/admin') !!}/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        @include('admin.blocks.mes') 
        <form method="post">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="txtUsername">{!! __('auth.username') !!}</label>
            <input type="text" name="txtUsername" class="form-control" id="txtUsername" placeholder="{!! __('auth.username') !!}">
                    <span class="error text-danger"> <?php if ($errors->has('txtUsername')) 
                                echo $errors->first('txtUsername');
                            ?></span>            
          </div>
          <div class="form-group">
            <label for="txtPass">{!! __('auth.password') !!}</label>
            <input type="password" name="txtPass" class="form-control" id="txtPass" placeholder="{!! __('auth.password') !!}">
             <span class="error text-danger"> 
                     <?php if ($errors->has('txtPass')) 
                                echo $errors->first('txtPass');
                            ?></span>
          </div>         
          <button type="submit" class="btn btn-primary btn-block">{!! __('auth.login') !!}</button>
        </form>        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{!! asset('public/admin') !!}/vendor/jquery/jquery.min.js"></script>
  <script src="{!! asset('public/admin') !!}/vendor/popper/popper.min.js"></script>
  <script src="{!! asset('public/admin') !!}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="{!! asset('public/admin') !!}/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>

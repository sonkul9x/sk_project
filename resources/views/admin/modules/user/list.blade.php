@extends('admin.app')
@section('title','List User')
@section('content')
   
           <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User List</li>
      </ol>
        <div class="card mb-3">
                @include('admin.blocks.mes')
        <div class="card-header">
          <i class="fa fa-table"></i> List Users
            <a class="pull-right btn btn-success btn-sm" role="button" href="{!! route('getUserAdd') !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add User</a>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Phone</th>
                    <th>Level</th>
                    <th>Controls</th>                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Phone</th>
                    <th>Level</th>
                    <th>Controls</th>    
                </tr>
              </tfoot>
              <tbody>
                 @if($data)
                    <?php $i = 0; ?>
                    @foreach($data as $item)
                        <?php $i++; ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td>{!! $item->username !!}</td>
                            <td>{!! $item->email !!}</td>
                            <td>{!! $item->phone !!}</td>
                            <td><b
                                        @if($item->group_id == 1 )
                                        @if($item->id == 1)
                                        style="color:darkmagenta;font-style:italic;"
                                        @else
                                        style="color:red;"
                                        @endif
                                        @elseif($item->group_id == 2)
                                        style="color:blue;"
                                        @else
                                        style="color:#222;"
                                        @endif
                                >{!! $item->usergroup_name !!}</b></td>
                            <td class="tb_center tb_control">
                                <a  class="btn btn-primary" role="button" href="{!! route('getUserEdit',['id' => $item->id]) !!}"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a  class="btn btn-danger" role="button" href="{!! route('getUserDel',['id' => $item->id]) !!}"
                                   onclick="return xacnhanxoa('Are you sure ?')"><i class="fa fa-times"
                                                                                    aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection
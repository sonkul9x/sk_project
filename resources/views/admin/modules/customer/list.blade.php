@extends('admin.app')
@section('title','List Customer')
@section('content')
    <main id="main" class="row">
        <div class="head-main">
            <div class="col-lg-6 head-title">
                <h3>List Customer</h3>
                <small>List all Customer</small>
            </div>
            <div class="col-lg-6 head-control">
                <a href="{!! route('dashboard') !!}"><i class="fa fa-list" aria-hidden="true"></i>Dashboard Controls</a>
               
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content-main">
            @include('admin.blocks.mes')
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Phone</th>
                    <th>Points</th>
                    <th class="tb_center">Controls</th>
                </tr>
                </thead>
                <tbody>
                @if($data)
                    @foreach($data as $item)
                        <tr>
                            <th scope="row">CT - {!! $item->id  !!}</th>
                            <td><a class="ShowCustomer" data-toggle="modal"  for="{!! $item->id !!}" href="#" data-base="{!! route('getCustomerShow',['id' => $item->id]) !!}" data-target="#modal">{!! $item->username !!}</a></td>
                            <td>{!! $item->email !!}</td>
                            <td>{!! $item->phone !!}</td>
                            <td>{!! $item->point !!}</b></td>
                            <td class="tb_center tb_control">
                                <a class="send" href="{!! route('getCustomerSend',['id' => $item->id]) !!}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                               <!--  <a class="edit" href="{!! route('getUserEdit',['id' => $item->id]) !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                <a class="delete" href="{!! route('getCustomerDel',['id' => $item->id]) !!}" onclick="return xacnhanxoa('Are you sure ?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
             {{ $data->links() }}
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          
        </div>
    </main>
@endsection
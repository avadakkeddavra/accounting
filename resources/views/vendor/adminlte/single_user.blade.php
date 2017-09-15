@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <section class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-3">

                <!-- Default box -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user1-128x128.jpg')}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">{{$user->email}}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Solded Products</b> <a class="pull-right">1,322 </a>
                            </li>
                            <li class="list-group-item">
                                <b>Cash by all time</b> <a class="pull-right">543 $</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total working hours</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <div class="col-md-9">

                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li><a href="#statistics" data-toggle="tab">Statistics</a></li>
                                <li><a href="#chart" data-toggle="tab">Chart</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="statistics">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <td>Название</td>
                                                <td>Цена</td>
                                                <td>Количество</td>
                                                <td>Дата создания</td>
                                                <td>Текущая дата</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                @if($product->created_at == date('Y-m-d'))
                                                    <tr>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->price}}</td>
                                                        <td>{{$product->CountProd}}</td>
                                                        <td>{{$product->created_at}}</td>
                                                        <td>@php echo date('Y-m-d') @endphp</td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="chart">
                                <div id="container"></div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
    </section>
@endsection

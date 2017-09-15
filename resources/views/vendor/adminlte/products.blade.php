@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td>Название</td>
                                    <td>Цена</td>
                                    <td>Статус</td>
                                    <td>Дата создания</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} $</td>
                                        <td>@if($product->trashed())
                                                <div class="label label-danger">trashed</div>
                                            @else
                                                <div class="label label-success">active</div>
                                            @endif
                                        </td>
                                        <td>{{$product->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                    <div class="pagintaion_nav" style="text-align: center;">
                        {{ $products->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection

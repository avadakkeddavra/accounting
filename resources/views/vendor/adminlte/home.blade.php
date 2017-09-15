@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	@if(Session::has('error'))
	<section class="errors">

		<div class="row" style="margin-left: 0;">
			<!-- /.col -->
			<div class="col-md-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">{{ Session::get('error') }}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>

	</section>
	@endif
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 ">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Home</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						{{ trans('adminlte_lang::message.logged') }}. Start creating your amazing application!
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

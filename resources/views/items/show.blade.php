@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default" id="item-show">
		<div class="panel-heading">Please review your saved product.</div>

		<div class="panel-body">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<img src="{{ $item->img_url }}" style="width:100%;">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="row">
					<div class="form-group">
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							<h4>Title:</h4>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6">
							<h4>{{ $item->title }}</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							<h4>Brand:</h4>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6">
							<h4>None</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							<h4>Price:</h4>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6">
							<h4>{{ $item->price }}</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
							<h4>Bullet Points:</h4>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-6 col-xs-6">
							@if (explode("\n", $item->bullet_points) > 0)
							<ul>
								@foreach(explode("\n", $item->bullet_points) as $point)
								<li>{{ $point }}</li>
								@endforeach
							</ul>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
							<h4>Best Seller Rank:</h4>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-6 col-xs-6">
							<h4>{{ $item->top_bsr }}</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
							<h4>Best Seller Rank:</h4>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-6 col-xs-6">
							<h4>{{ $item->bottom_bsr }}</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							<h4>Keywords:</h4>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6">
							<h4>{{ $item->keywords }}</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							<h4>Created At:</h4>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6">
							<h4>{{ $item->created_at }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
					<a href="{{ $item->link }}" target="_newTab" class="btn btn-default form-control">View on Amazon</a>
				</div>
				<div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-6 col-xs-6">
					<button class="btn btn-danger form-control" id="item-btn-delete">Delete</button>
				</div>
			</div>
		</div>
		<form action="{{ route('items.destroy', ['id' => $item->id]) }}" id="delete-form" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="DELETE">
		</form>
	</div>
</div>
@endsection
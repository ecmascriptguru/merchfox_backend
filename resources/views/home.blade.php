@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">You can see products pulled from Amazon.</div>

			<div class="panel-body">
				<form action="{{ route('home_post') }}" method="post" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" placeholder="Please enter any keyword" name="keyword" class="form-control" value="{{ $keyword }}">
					</div>
				</form>
				<table id="products-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Image</th>
							<th>Title</th>
							<th>Bullet Points</th>
							<th>Price</th>
							<th>BSR</th>
							<th>bsr</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td><img src="{{ $product->img_url }}" class="product-image"></td>
							<td>{{ $product->title }}</td>
							<td>
								@if(sizeof(explode("\n", $product->bullet_points)) > 0 && explode("\n", $product->bullet_points)[0] != "")
								<ul>
									@foreach(explode("\n", $product->bullet_points) as $point)
									<li>{{ $point }}</li>
									@endforeach
								</ul>
								@endif
							</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->top_bsr }}</td>
							<td>{{ $product->bottom_bsr }}</td>
							<td><a href="{{ $product->link }}" target="_newTab"><button class="btn btn-success">Check</button></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="pagination-container col-xs-12" style="text-align:right;">
					{{ $products->links() }}
				</div>
				<div class="controller-container row">
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
						<a href="/" class="form-control btn btn-success">Back</a>
					</div>
					@if (Auth::user()->role_id == 1)
					<div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-6 col-xs-6">
						<button id="btn-truncate" data-href="{{ route('truncate') }}" class="form-control btn btn-danger">Truncate Products</button>
					</div>
					@endif
				</div>
				<form action="{{ route('truncate') }}" method="post" id="frm-truncate">
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

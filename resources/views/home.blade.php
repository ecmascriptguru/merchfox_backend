@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">You can see products pulled from Amazon.</div>

			<div class="panel-body">
				<table id="products-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Image</th>
							<th>Title</th>
							<th>Keywords</th>
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
                            <td>{{ $product->keywords }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->top_bsr }}</td>
                            <td>{{ $product->bottom_bsr }}</td>
                            <td><a href="{{ $product->link }}" target="_newTab"><button class="btn btn-success">Check</button></a></td>
                        </tr>
						@endforeach
					</tbody>
				</table>
				<div class="pagination-container col-xs-12" style="float:right;">
					{{ $products->links() }}
				</div>
				<div class="controller-container row">
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
						<button class="form-control btn btn-success">Reload</button>
					</div>
					<div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-6 col-xs-6">
						<button id="btn-truncate" data-href="{{ route('truncate') }}" class="form-control btn btn-danger">Truncate Database</button>
					</div>
				</div>
                <form action="{{ route('truncate') }}" method="post" id="frm-truncate">
                    {{ csrf_field() }}
                </form>
			</div>
		</div>
	</div>
</div>
@endsection

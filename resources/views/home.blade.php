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
				<div class="pagination-container" style="float:right;">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

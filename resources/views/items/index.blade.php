@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Here are the products you saved.</div>

			<div class="panel-body">
				<table id="products-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Product Image</th>
							<th>Title</th>
							<th width="60px">Price</th>
							<th>BSR</th>
							<th>bsr</th>
							<th>Keywords</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td><img src="{{ $item->img_url }}" class="product-image"></td>
							<td>{{ $item->title }}</td>
							<td>{{ $item->price }}</td>
							<td>{{ $item->top_bsr }}</td>
							<td>{{ $item->bottom_bsr }}</td>
							<td>{{ $item->keywords }}</td>
							<td class="actions">
								<a href="{{ route('items.show', $item->id) }}" class="btn btn-default">View</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Here are the products you saved.</div>

			<div class="panel-body">
				<table id="products-table" class="table table-striped table-bordered datatables" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Product Image</th>
							<th>Title</th>
							<th>Bullet Points</th>
							<th width="60px">Price</th>
							<th>BSR</th>
							<th>bsr</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $index = 1; ?>
						@foreach($items as $item)
						<tr>
							<td>{{ $index }}</td>
							<td><img src="{{ $item->img_url }}" class="product-image"></td>
							<td>{{ $item->title }}</td>
							<td>
								@if (sizeof(explode("\n", $item->bullet_points)) > 0 && explode("\n", $item->bullet_points)[0] != "")
								<ul>
									@foreach(explode("\n", $item->bullet_points) as $point)
									<li>{{ $point }}</li>
									@endforeach
								</ul>
								@endif
							</td>
							<td>{{ $item->price }}</td>
							<td>{{ $item->top_bsr }}</td>
							<td>{{ $item->bottom_bsr }}</td>
							<td class="actions">
								<a href="{{ route('items.show', $item->id) }}" class="btn btn-default">View</a>
							</td>
						</tr>
						<?php $index++; ?>
						@endforeach
					</tbody>
				</table>
				<div class="pagination-container col-xs-12" style="text-align:right;">
					{{ $items->links() }}
				</div>
				<form action="{{ route('truncate_items') }}" method="post" id="frm-truncate">
					{{ csrf_field() }}
				</form>
			</div>

			<div class="panel-footer">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
						<a href="{{ route('excel_download') }}" class="btn btn-success form-control">Export to Excel</a>
					</div>
					@if (Auth::user()->role_id == 1)
					<div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-6 col-xs-6">
						<button class="btn btn-danger form-control" data-href="{{ route('truncate_items') }}" id="btn-truncate">Delete Saved Items</button>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
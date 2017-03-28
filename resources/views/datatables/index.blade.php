@extends('layouts.master')

@section('content')
	<table class="table table-bordered" id="products-table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Image</th>
				<th>Title</th>
				<th>Keywords</th>
				<th>BSR</th>
                <th>bsr</th>
                <th>Price</th>
                <!-- <th>Actions</th> -->
			</tr>
		</thead>
	</table>
@stop

@push('scripts')
<script>
$(function() {
	$('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'img_url', name: 'img_url' },
            { data: 'title', name: 'title' },
            { data: 'keywords', name: 'keywords' },
            { data: 'top_bsr', name: 'top_bsr' },
            { data: 'bottom_bsr', name: 'bottom_bsr' },
            { data: 'top_bsr', name: 'price' },
        ]
    });
});
</script>
@endpush
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">News Listing</div>

                <div class="panel-body">
                    <div class="row">
                    	<div class="col-md-12">
                    		<a href = "{{ route('news.create') }}" class="btn btn-primary btn-sm">Add New Data</a>
                    		<table class="table">
                    			<thead>
                    				<tr>
                    					<th>No</th>
                    					<th>Judul</th>
                    					<th>Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
	                    			@foreach($lists as $row)
	                    				<tr>
	                    					<td>{{ $loop->iteration }}</td>
	                    					<td>{{ $row->judul }}</td>
	                    					<td>
	                    						<a href = "{{ route('news.edit',$row->id) }}" class="btn btn-success btn-sm">Edit</a>
	                    						{!! Form::open(['method'=>'DELETE','route'=>['news.destroy',$row->id]]) !!}
	                    						 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
	                    						{!! Form::close() !!}
                    						</td>
	                    				</tr>
	                    			@endforeach
                    			</tbody>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

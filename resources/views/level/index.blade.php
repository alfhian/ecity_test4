@extends('layouts.master')

@section('content')

<div class="h-100 float-end content">
	<div class="w-100">
		@include('layouts.navbar')
	</div>
	<div class="px-4 w-100 container">
		<div class="pb-3 d-flex flex-row bd-highlight">
			<div class="pe-2 bd-highlight">
				<x-button size="sm" type="blue" method="add" route="add" title="+Add"/>
			</div>
			<div class="pe-2 bd-highlight">
				<x-button size="sm" type="blue" method="edit" route="edit" title="Edit"/>
			</div>
			<div class="pe-2 bd-highlight">
				<x-button size="sm" type="danger" method="remove" route="remove" title="Remove"/>
			</div>
			<div class="pe-2 bd-highlight">
				<div class="dropdown">
				  	<button class="btn btn-sm btn-blue dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						Export
				  	</button>
				  	<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item small" href="#">Excel</a></li>
						<li><a class="dropdown-item small" href="#">CSV</a></li>
				  	</ul>
				</div>
			</div>
		</div>
		<div class="w-100 py-3">
			<table id="table-data" class="table table-light table-striped table-hover" style="width:100%">
		        <thead>
		            <tr>
						<th>
							<div class="form-check">
  								<input type="checkbox" class="form-check-input" name="check" id="checkAll">
							</div>
						</th>
		                <th>ID</th>
		                <th>Level</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($view as $index=>$row)
		            <tr>
						<td>
							<div class="form-check">
								<input type="checkbox" class="form-check-input check" name="check" value="{{ $row->id_level }}" id="check{{ $index+1 }}">
							</div>
						</td>
		                <td>{{ $row->id_level }}</td>
		                <td>{{ $row->nama_level }}</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
	    $('#table-data').DataTable({
			order: [[1, 'asc']],
			'columnDefs': [{
				"orderable": false, "targets": [0] 
			}]
		});
	});
</script>

@endsection
@extends('layouts.master')

@section('content')

<div class="h-100 float-end content">
	<div class="w-100">
		@include('layouts.navbar')
	</div>
	<div class="container mt-3">
		<!-- Modal -->
		<div class="modal fade" id="mandatoryWarning" tabindex="-1" aria-labelledby="mandatoryWarning" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalLable">Warning !</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="modal-body-warning">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<form method="post" action="/department/add/save">
			@csrf
		<div class="px-5 form-layout profile">
			<div class="row">
				<div class="col-md-12">
					<table class="w-100 input-table" cellpadding="5">
						<tr>
							<td>
								<label for="nama_dept" class="pe-4">Nama Department</label>
								<input type="text" class="form-control" name="nama_dept" id="nama_dept">
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td align="right" style="height: 5rem;">
								<button type="button" class="btn btn-sm btn-danger me-2" onclick="cancel('department')">Cancel</button>
								<button class="btn btn-sm btn-primary" id="save">Save</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

@endsection
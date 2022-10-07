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

		<form method="post" action="/karyawan/edit/save">
			@csrf
		<div class="px-5 form-layout profile">
			<div class="row">
				<div class="col-md-12">
					<table class="w-100 input-table" cellpadding="5">
						<input type="hidden" name="id" value="{{ $row->id }}">
						<tr>
							<td>
								<label for="nik" class="pe-4">NIK</label>
								<input type="text" class="form-control" name="nik" id="nik" value="{{ $row->nik }}" maxlength="10" required>
							</td>
						</tr>
						<tr>
							<td>
								<label for="nama" class="pe-4">Nama</label>
								<input type="text" class="form-control" name="nama" id="nama" value="{{ $row->nama }}" maxlength="100" required>
							</td>
						</tr>
						<tr>
							<td>
								<label for="ttl" class="pe-4">Ttl</label>
								<input type="date" class="form-control" name="ttl" id="ttl" value="{{ $row->ttl }}" required>
							</td>
						</tr>
						<tr>
							<td>
								<label for="alamat" class="pe-4">Alamat</label>
								<textarea class="form-control" name="alamat" id="alamat" required>{{ $row->alamat }}</textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="jabatan" class="pe-4">Jabatan</label>
								<select class="jabatan" id="jabatan" name="jabatan" style="width: 100%;" required>
									@foreach($jabatan as $jab)
									<option value="{{ $jab->id_jabatan }}">{{ $jab->nama_jabatan }}</option>
									@endforeach
                                    @foreach($otherJabatan as $rowOther)
									<option value="{{ $rowOther->id_jabatan }}">{{ $rowOther->nama_jabatan }}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="department" class="pe-4">Department</label>
								<select class="department" id="department" name="department" style="width: 100%;" required>
									@foreach($department as $dept)
									<option value="{{ $dept->id_dept }}">{{ $dept->nama_dept }}</option>
									@endforeach
                                    @foreach($otherDepartment as $rowOther)
									<option value="{{ $rowOther->id_dept }}">{{ $rowOther->nama_dept }}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td align="right" style="height: 5rem;">
								<button type="button" class="btn btn-sm btn-danger me-2" onclick="cancel('karyawan')">Cancel</button>
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
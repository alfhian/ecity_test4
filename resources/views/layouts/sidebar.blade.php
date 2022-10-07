<div class="h-100 float-start sidebar">
	<h5 class="ms-4 my-4">HRIS</h5>
	<nav class="mt-5">
		<div class="accordion accordion-flush" id="modul">
			@foreach($modParent as $parent)
			<div class="accordion-item">
			    <h2 class="accordion-header" id="{{ strtolower($parent->module->title) }}">
			    	@if($parent->module->have_sub == 'N')
			    	<button class="accordion-button collapsed hide" type="button" onclick="location.href='{{ url($parent->module->route) }}'">
					{{ $parent->module->title }}
			        </button>
			        @else
			      	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ strtolower($parent->module->title) }}-sub" aria-expanded="false" aria-controls="recruitment">
			      		{{ $parent->module->title }}
			      	</button>
			      	@endif
			    </h2>
			    @if($parent->module->have_sub == 'Y')
			    <div id="{{ strtolower($parent->module->title) }}-sub" class="accordion-collapse collapse" aria-labelledby="{{ $parent->module->title }}" data-bs-parent="#modul">
			      	<div class="accordion-body">
						<ul class="list-group">
							@php
								$parentGroup 	= $parent->module->module_group;

								$modSub     	= \App\Models\ModuleAuthorization::join('modules', 'modules.id', 'module_authorizations.module_id')->where(['module_authorizations.group_id' => \Auth::user()->group_id, 'modules.status' => 2, 'modules.module_group' => $parentGroup])->get();
							@endphp
			    			@foreach($modSub as $sub)
							<li class="list-group-item list-group-item-action border-0" onclick="location.href='{{ url($sub->module->route) }}'">{{ $sub->module->title }}</li>
							@endforeach
						</ul>
			      	</div>
			    </div>
			    @endif
			</div>
			@endforeach
		</div>
	</nav>
</div>
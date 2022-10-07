<div class="px-3 d-flex bd-highlight">
	<div class="p-2 flex-grow-1 bd-highlight">
		<h4>{{ $title }}</h4>
	</div>
	<div class="p-2 bd-highlight">
		<span class="small">{{ $username }}</span>
	</div>
	<div class="p-2 bd-highlight">
		<button class="btn border-0 p-0 text-muted">
			<i class="fas fa-cog setting"></i>
		</button>
	</div>
	<div class="p-2 bd-highlight">
		<form method="post" action="{{ route('logout') }}">
			@csrf
			<button class="btn border-0 p-0 text-muted">
				<i class="fas fa-sign-out-alt logout"></i>
			</button>
		</form>
	</div>
</div>
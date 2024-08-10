<div class="page-title d-flex justify-content-between">
	<h1 class="page-heading text-gray-100 fw-bold fs-3x mb-0" style="text-shadow: 5px 5px 30px #880b29;">
	   @yield('title-page', '#######')
	</h1>
	<div class="d-flex">
		<div class="card me-3">
			<div class="card-body py-2 d-flex align-items-center">
				<span class="text-gray-800 fw-bolder fs-3">Oiii {{ Auth::user()->name }} 😁
				</span>
				@if (Auth::user()->admin == 1)
					<span class="badge badge-light-danger ms-2">Administrador</span>
				@endif
			</div>
		</div>
		<div class="card">
			<a href="{{ route('logout') }}" class="card-body py-2 d-flex align-items-center">
				<span class="text-gray-800 fw-bolder fs-3">Sair</span>
			</a>
		</div>
	</div>
</div>
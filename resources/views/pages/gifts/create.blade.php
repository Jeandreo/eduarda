@extends('layouts.app')

@section('title-page', 'Adicionar Presente')

@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{ route('gifts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@include('pages.gifts._form')
			<div class="d-flex justify-content-between">
				<a href="{{ route('dashboard') }}" class="btn btn-light mt-2">Voltar</a>
				<button type="submit" class="btn btn-primary btn-active-danger mt-2">Cadastrar</button>
			</div>
		</form>
	</div>
</div>
@endsection
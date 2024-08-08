@extends('layouts.app')

@section('title-page', 'Editar Presente')

@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{ route('gifts.update', $content->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			@include('pages.gifts._form')
			<div class="d-flex justify-content-between">
				<a href="{{ route('dashboard') }}" class="btn btn-light mt-2">Voltar</a>
				<button type="submit" class="btn btn-primary btn-active-danger mt-2">Atualizar</button>
			</div>
		</form>
	</div>
</div>
@endsection
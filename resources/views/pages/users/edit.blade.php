@extends('layouts.app')

@section('title-page', 'Editar Usuário')

@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{ route('users.update', $content->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			@include('pages.users._form')
		</form>
	</div>
</div>
@endsection
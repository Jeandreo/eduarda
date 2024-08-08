@extends('layouts.app')

@section('title-page', 'Adicionar Usuário')

@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@include('pages.users._form')
		</form>
	</div>
</div>
@endsection
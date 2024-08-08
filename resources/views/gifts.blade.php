@extends('layouts.app')

@section('title-page', 'Minha Lista')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-8">
                <div class="card-body">
                    <h2 class="text-gray-800 fw-bolder">Oláaaaa</h2>
                    <p class="text-gray-700">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
        @foreach ($gifts as $gift)
        <div class="col-3">
            <div class="card mb-4">
                <div class="card-body p-4 text-center">
                    <img src="{{ findImage('presentes/' . ($gift->id ?? 0) . '.jpg', 'no-photo') }}" class="w-250px h-250px rounded" alt="">
                    <h2 class="fw-bolder text-gray-700 text-center my-5">{{ $gift->name }}</h2>
                    <div>
                        @if (Auth::user()->gift)
                            <span class="btn btn-light text-uppercase fw-bolder">
                                Você já escolheu
                            </span>
                        @else
                        @if ($gift->take_by == null)
                            <a href="{{ route('gifts.take', $gift->id) }}" class="btn btn-primary btn-active-success text-uppercase fw-bolder">
                                Vou levar esse 🥰
                            </a>
                        @else
                            <span class="btn btn-danger text-uppercase fw-bolder">
                                Já escolheram esse 🥲
                            </span>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
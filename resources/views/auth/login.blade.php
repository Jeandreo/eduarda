@extends('layouts.app')
@section('content')
<div class="w-100 vh-100 d-flex align-items-center justify-content-center p-4">
    <div class="card w-750px">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">
                        Seja Bem Vinda! ❤️
                    </h1>
                    <div class="d-none d-md-block">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/QKgo47jdVsY?si=ksuYyrGzjmoxGCeD" class="rounded shadow" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="d-block d-md-none">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/QKgo47jdVsY?si=ksuYyrGzjmoxGCeD" class="rounded shadow" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="separator separator-content mt-14 mb-8">
                    <span class="w-350px text-gray-600 fw-semibold fs-7">Acesse com seus dados abaixo</span>
                </div>
                <div class="mb-5">
                    <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control form-control-solid" required> 
                </div>
                <div class="mb-3 position-relative">
                    <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control form-control-solid" required>
                    <i class="fa-solid fa-eye fs-3 position-absolute top-50 end-0 translate-middle-y me-5 show-pass text-gray-700 text-hover-primary cursor-pointer"></i>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        Acessar
                    </button>
                </div>
                <div class="text-gray-500 text-center fw-semibold fs-6">
                    Não esta conseguindo acessar?
                    <a href="https://wa.me/554191971430?text=Oii%2C%20Preciso%20de%20ajuda%20para%20acessar%20o%20site." target="_blank" class="link-primary">
                    Clique Aqui
                    </a>
                    que eu te ajudo 😁
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-footer')
<script>
    $(document).ready(function(){
        $('.show-pass').click(function(){
            $(this).toggleClass('fa-eye fa-eye-slash');
            // Seleciona o campo de senha
            var passwordField = $('[name="password"]');
                
            // Alterna o tipo do campo entre "password" e "text"
            var isPassword = passwordField.attr('type') === 'password';
            passwordField.attr('type', isPassword ? 'text' : 'password');
        });
    });
</script>
@endsection
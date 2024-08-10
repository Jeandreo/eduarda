<div class="row">
    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-12 col-md-6 mb-5">
                <label class="form-label fw-bold">Nome:</label>
                <input type="text" class="form-control form-control-solid" placeholder="Nome da pessoa" name="name" value="{{ $content->name ?? old('name') }}" required/>
            </div>
            <div class="col-12 col-md-6 mb-5">
                <label class="form-label fw-bold">Email:</label>
                <input type="email" class="form-control form-control-solid" placeholder="Email" name="email" value="{{ $content->email ?? old('email') }}" required/>
            </div>
            <div class="col-12 mb-5">
                <label class="form-label fw-bold">Senha:</label>
                <div class="position-relative">
                    <input type="text" class="form-control form-control-solid" placeholder="*******" name="password" value="{{ old('password') }}" required/>
                    <div class="position-absolute top-50 end-0 translate-middle-y">
                        <i class="fa-solid fa-key text-gray-700 text-hover-primary cursor-pointer fs-3 me-3 generate-pass"></i>
                        <i class="fa-solid fa-eye fs-3 me-6 text-gray-700 text-hover-primary cursor-pointer show-pass"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-5">
                <label class="form-label fw-bold">Telefone:</label>
                <input type="text" class="form-control form-control-solid" placeholder="(00) 0 0000-0000" name="phone" value="{{ $content->phone ?? old('phone') }}" required/>
            </div>
            <div class="col-12 mb-5">
                <label class="form-label fw-bold">Foto (opicional)</label>
                <input type="file" class="form-control form-control-solid" placeholder="Foto do item" name="photo" value="{{ $content->photo ?? old('photo') }}" accept="image/*"/>
            </div>
			<div class="d-flex justify-content-between">
				<a href="{{ route('users.index') }}" class="btn btn-light mt-2">Voltar</a>
				<button type="submit" class="btn btn-primary btn-active-danger mt-2">@if(!isset($content))Cadastrar @else Atualizar @endif</button>
			</div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <img src="{{ findImage('presentes/' . ($content->id ?? 0) . '.jpg', 'no-photo') }}" class="w-100 rounded" alt="">
    </div>
</div>

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


        // Função para gerar uma senha aleatória
        function generateRandomPassword(length) {
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            return password;
        }

        // Evento de clique para gerar uma senha aleatória
        $('.generate-pass').click(function() {
            var passwordField = $('[name="password"]');
            var newPassword = generateRandomPassword(12); // Tamanho da senha
            passwordField.val(newPassword);
        });
    });
</script>
@endsection
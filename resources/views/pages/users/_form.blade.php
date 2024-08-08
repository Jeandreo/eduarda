<div class="row">
    <div class="col-8">
        <div class="row">
            <div class="col-6 mb-5">
                <label class="form-label fw-bold">Nome:</label>
                <input type="text" class="form-control form-control-solid" placeholder="Nome da pessoa" name="name" value="{{ $content->name ?? old('name') }}" required/>
            </div>
            <div class="col-6 mb-5">
                <label class="form-label fw-bold">Email:</label>
                <input type="email" class="form-control form-control-solid" placeholder="Email" name="email" value="{{ $content->email ?? old('email') }}" required/>
            </div>
            <div class="col-12 mb-5">
                <label class="form-label fw-bold">Senha:</label>
                <input type="password" class="form-control form-control-solid" placeholder="*******" name="password" value="{{ $content->password ?? old('password') }}" required/>
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
    <div class="col-4">
        <img src="{{ findImage('presentes/' . ($content->id ?? 0) . '.jpg', 'no-photo') }}" class="w-100 rounded" alt="">
    </div>
</div>
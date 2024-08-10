<div class="row">
    <div class="col-12 col-md-8">
        <div class="mb-5">
            <label class="form-label fw-bold">Nome:</label>
            <input type="text" class="form-control form-control-solid" placeholder="Nome do item" name="name" value="{{ $content->name ?? old('name') }}" required/>
        </div>
        <div class="mb-5">
            <label class="form-label fw-bold">Foto (opicional)</label>
            <input type="file" class="form-control form-control-solid" placeholder="Foto do item" name="photo" value="{{ $content->photo ?? old('photo') }}" accept="image/*"/>
        </div>
        <div class="mb-5">
            <label class="form-label fw-bold">Descrição (opicional)</label>
            <textarea name="description" class="form-control form-control-solid" placeholder="Deseja que apareça algum texto">@if(isset($content->description)){{$content->description}}@endif</textarea>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <img src="{{ findImage('presentes/' . ($content->id ?? 0) . '.jpg', 'no-photo') }}" class="w-100 rounded" alt="">
    </div>
</div>
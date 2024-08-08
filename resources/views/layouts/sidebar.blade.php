
<div class="card mb-5">
    <a href="{{ route('dashboard') }}" class="card-body">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-gift text-success fs-2x me-6"></i>
            <span class="text-gray-700 fw-bolder fs-2">Lista de Presentes</span>
        </div>
    </a>
</div>
<div class="card mb-5">
    <a href="{{ route('users.index') }}" class="card-body">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-users text-info fs-2x me-6"></i>
            <span class="text-gray-700 fw-bolder fs-2">Usuários</span>
        </div>
    </a>
</div>
<div class="card mb-5">
    <a href="{{ route('logout') }}" class="card-body">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-right-from-bracket text-danger fs-2x me-6"></i>
            <span class="text-gray-700 fw-bolder fs-2">Sair</span>
        </div>
    </a>
</div>
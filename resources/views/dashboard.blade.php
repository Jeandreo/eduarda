@extends('layouts.app')

@section('title-page', 'Minha Lista')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatable" class="table table-striped table-row-bordered gy-3 gs-7 border rounded align-middle">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                        <th>Presente</th>
                        <th>Pego Por</th>
                        <th>Pego às</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gifts as $gift)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ findImage('presentes/' . ($gift->id ?? 0) . '.jpg', 'no-photo') }}" class="w-25px h-25px rounded me-4" alt="">
                                <a href="{{ route('gifts.edit', $gift->id) }}" class="fw-bolder text-gray-700 text-hover-primary">{{ $gift->name }}</a>
                            </div>
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            @if ($gift->status == true)
                                <span class="badge badge-light-success">Ativo</span>
                            @else
                                <span class="badge badge-light-danger">Desativado</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('gifts.edit', $gift->id) }}">
                                <i class="fa-solid fa-pen-to-square text-gray-700 text-hover-primary mx-1"></i>
                            </a>
                            <a href="{{ route('gifts.destroy', $gift->id) }}">
                                <i class="fa-solid fa-rotate text-gray-700 text-hover-primary mx-1"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('gifts.create') }}" class="btn btn-primary btn-active-info fw-bold">
                Adicionar Presente
            </a>
        </div>
    </div>
@endsection


@section('custom-footer')
<script>
    $("#datatable").DataTable({
        pageLength: 25,
        aaSorting: [],
        language: {
            search: 'Pesquisar:',
            lengthMenu: 'Mostrando _MENU_ registros por página',
            zeroRecords: 'Ops, não encontramos nenhum resultado :(',
            info: 'Mostrando _START_ até _END_ de _TOTAL_ registros',
            infoEmpty: 'Nenhum registro disponível',
            infoFiltered: '(Filtrando _MAX_ registros)',
            processing: 'Filtrando dados',
            paginate: {
                previous: 'Anterior',
                next: 'Próximo',
                first: '<i class="fa-solid fa-angles-left text-gray-300 text-hover-primary cursor-pointer"></i>',
                last: '<i class="fa-solid fa-angles-right text-gray-300 text-hover-primary cursor-pointer"></i>',
            },
        },
        dom:
            "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            '>' +
            "<'table-responsive'tr>" +
            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            '>',
    });
</script>
@endsection
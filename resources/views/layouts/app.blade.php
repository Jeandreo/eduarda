<!DOCTYPE html>
<html lang="pt-BR"  data-bs-theme-mode="light" >
    <head>
        @include('layouts.head')
    </head>
    <body style="background: url('{{ asset('assets/media/images/background.jpg') }}'); background-position: center center; background-size: cover;">
        @include('layouts.config')
        <div class="content">
            <div class="container">
                <div class="row py-12">
                    <div class="col-12 mb-8">
                        @include('layouts.title')
                    </div>
                    @if (!isset($fullWidth))
                    <div class="col-3">
                        @include('layouts.sidebar')
                    </div>
                    <div class="col-9">
                        @yield('content')
                    </div>
                    @endif
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @if(session('message'))
        <div class="modal fade" tabindex="-1" id="message_modal">
            <div class="modal-dialog modal-dialog-centered mw-750px">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="fs-2x text-gray-700 text-center m-0">{!! session('message') !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <script>
            var hostUrl = "assets/";
			var globalUrl = "{{ route('index') }}";
			var csrf = "{{ csrf_token() }}";
        </script>
        <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('/assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/pt.min.js"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
        <script>
            $(document).ready(function(){
                // Verifique se existe uma mensagem de sessão
                @if(session('message'))
                    $('#message_modal').modal('show');
                @endif
            });
        </script>
        @yield('custom-footer')
    </body>
</html>

// VERIFICAR EMAIL
$(document).on('submit', '.form-verify-email', function(e){

    // PARA EVENTO 
    e.preventDefault();

    // EXIBI SPINNER NO BOTÃO
    $('.btn-loading').prop('disabled', true).attr('data-kt-indicator', 'on');
    $('.form-verify-email .login-result').fadeOut();

    // COLETA EMAIL
    var email = $(this).find('[name="email"]').val();

    // AJAX
    $.ajax({
        type: 'POST',
        url: globalUrl + '/verificar-email',
        data: {
            _token: '{{ csrf_token() }}',
            email: email,
        },
        success: function(response) {

            // ESCONDE SPINNER NO BOTÃO
            $('.btn-loading').prop('disabled', false).attr('data-kt-indicator', 'off');

            // EMAIL ENCONTRADO
            if (response == true) {
                
                // ESCONDE VERIFICAÇÃO DE EMAIL
                $('.form-verify-email').fadeOut('slow', function() {

                    // EXIBE LOGIN
                    $('.form-login').fadeIn('slow');
                    $('.form-login [name="email"]').val(email);

                });

            } else {

                // EXIBE ERROS
                $('.message-email').hide();
                $('.form-verify-email .login-result').fadeIn('slow');

            }
                
        }
    });
});

// REALIZA LOGIN
$(document).on('submit', '.form-login', function(e){

    // PARA EVENTO
    e.preventDefault();

    // EXIBI SPINNER NO BOTÃO
    $('.btn-loading').prop('disabled', true).attr('data-kt-indicator', 'on');
    $('.login-result').fadeOut('slow');

    // COLETA DADOS
    var email = $(this).find('[name="email"]').val();
    var password = $(this).find('[name="password"]').val();
    var remember = $(this).find('[name="remember"]').is(':checked') ? true : false;

    // VERIFICA SE DEVE RECARREGAR
    var reload = $(this).find('.reload').length == true;

    // AJAX
    $.ajax({
        url: globalUrl + '/login-cliente',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            email: email,
            password: password,
            remember: remember
        },
        success: function(response) {

            // LOGADO COM SUCESSO
            if (response['code'] == 200) {

                // REDIRECIONA
                if(reload) {
                    location.reload();
                } else {

                    // AJUSTA DADOS RELACIONADOS AO CLIENTE
                    $('.login-name').html(response['client']['name']);
                    $('.login-greeting').html(response['greeting']);
                    $('.img-header').attr('src', response['img-client']);
                    
                    // CHANGE DIVS
                    $('#chat-step-02').fadeOut('slow', function() {
                        $('#chat-step-03').fadeIn();
                        $('#step_chat_footer').removeClass('opacity-0');
                    });

                }

                // ESCONDE SPINNER NO BOTÃO
                setTimeout(function(){
                    $('.btn-loading').prop('disabled', false).attr('data-kt-indicator', 'off');
                    }, 10000);

            } else {

                // EXIBE ERRO
                $('.login-result').fadeIn('slow').html(response['message']);
                $('.btn-loading').prop('disabled', false).attr('data-kt-indicator', 'off');

            }
            
        },
    });

});

// VOLTA PARA O LOGIN
$(document).on('click', '.recovery-voltar-login', function(){
    // OCULTA RECUPERAÇÃO
    $('.form-recovery').fadeOut('slow', function() {
        $('.form-login').fadeIn('slow');
    });
});


// EXIBE RECUPERAÇÃO DE SENHA
$(document).on('click', '.recovery-login', function(){
    
    // COLETA EMAIL
    var email = $('.form-login').find('[name="email"]').val();

    // EXIBE RECUPERAÇÃO
    $('.form-login').fadeOut('slow', function() {
        $('.form-recovery').fadeIn('slow');
        $('.form-recovery [name="email"]').val(email);
    });

});

// REALIZA DE RECUPERAÇÃO DE SENHA
$(document).on('submit', '.form-recovery', function(e){

    // PARA EVENTO
    e.preventDefault();

    // EXIBI SPINNER NO BOTÃO
    $('.btn-loading').prop('disabled', true).attr('data-kt-indicator', 'on');

    // COLETA EMAIL
    var email = $('.form-recovery').find('[name="email"]').val();

    // AJAX
    $.ajax({
        url: globalUrl + '/recuperar-senha',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            email: email,
        },
        success: function(response) {
            
            // ESCONDE SPINNER NO BOTÃO
            $('.btn-loading').prop('disabled', false).attr('data-kt-indicator', 'off');

            // EMAIL NÃO ENCONTRADO
            if (response == false) {
                $('.recovery-error-result').show();
            } else {
                
                // EXIBE EMAIL A SER RECUPERADO
                $('.email-client').html(email);

                // ESCONDE RECUPERAÇÃO E EXIBE SUCESSO
                $('.form-recovery').hide();
                $('.recovery-sucess').show();

                // Adiciona um delay de 20 segundos antes de recarregar a página
                var seconds = 20;

                function updateCountdown(){
                    $('#countdown').text("Recarregando a página em " + seconds + " segundos...");
                    seconds--;

                    if (seconds < 0) {
                        // Quando a contagem regressiva chegar a 0, recarregue a página
                        location.reload();
                    } else {
                        // Atualiza a contagem regressiva a cada segundo (1000 milissegundos)
                        setTimeout(updateCountdown, 1000);
                    }
                } updateCountdown();

            }
        }
    });

});

// DESEJA SE REGISTRAR
$(document).on('click', '.click-to-register', function(){
    
    // COLETA EMAIL
    var email = $('.form-verify-email').find('[name="email"]').val();

    // ESCONTE VERIFICAÇÃO E EXIBE REGISTRAR
    $('.form-verify-email').fadeOut('slow', function() {
        $('.form-register').fadeIn('slow');
        $('.form-register [name="email"]').val(email);
    });

});

// ALTEROU O EMAIL DE REGISTRAR
$(document).on('keydown', '.form-register [name="email"]', function(){
    
    // COLETA EMAIL
    var email = $(this).val();

    // AJAX
    $.ajax({
        type: 'POST',
        url: globalUrl + '/verificar-email',
        data: {
            _token: '{{ csrf_token() }}',
            email: email,
        },
        success: function(response) {

            // ENCONTROU EMAIL
            if (response == true) {
                
                // ESCONDE REGISTRAR
                $('.form-register').fadeOut('slow', function() {

                    // EXIBE LOGAR
                    $('.form-login').fadeIn('slow');
                    $('.form-login [name="email"]').val(email);

                });

            } 
        }
    });
});

// ENVIA REGISTRAR
$(document).on('submit', '.form-register', function(e){
    
    // PARA EVENTO
    e.preventDefault();

    // EXIBI SPINNER NO BOTÃO
    $('.btn-loading').prop('disabled', true).attr('data-kt-indicator', 'on');

    // COLETA DADOS
    var email = $(this).find('[name="email"]').val();
    var name = $(this).find('[name="name"]').val();
    var phone_1 = $(this).find('[name="phone_1"]').val();
    var password = $(this).find('[name="password"]').val();
    var remember = $(this).find('[name="remember"]').is(':checked') ? true : false;


    // VERIFICA SE DEVE RECARREGAR
    var reload = $(this).find('.reload').length == true;

    // AJAX
    $.ajax({
        url: globalUrl + '/registrar-se/ajax',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            email: email,
            name: name,
            phone_1: phone_1,
            password: password,
            remember: remember,
        },
        success: function(response) {

            if (response['code'] == 200) {
                
                // REDIRECIONA
                if(reload) {
                    location.reload();
                } else {

                    // AJUSTA DADOS RELACIONADOS AO CLIENTE
                    $('.login-name').html(response['client']['name']);
                    $('.login-greeting').html(response['greeting']);
                    $('.img-header').attr('src', response['img-client']);
                    
                    // CHANGE DIVS
                    $('#chat-step-02').fadeOut('slow', function() {
                        $('#chat-step-03').fadeIn();
                        $('#step_chat_footer').removeClass('opacity-0');
                    });

                }

            // ESCONDE SPINNER NO BOTÃO
            setTimeout(function(){
            $('.btn-loading').prop('disabled', false).attr('data-kt-indicator', 'off');
            }, 10000);
            

            } else {

                // MESSAGE ERROR
                $(this).find('.login-result').html(response['message']);

            }
        },
    });
});
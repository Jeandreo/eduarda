// Define os valores do contador
var timerInterval;
var startTime;
var elapsedTime = 0;
var isRunning = false;

// Transforma tempo em segundos
function timeToSeconds(){

    // Obtem tempo
    var time = $('#timer-play-time').text().trim();

    // Separa tempo
    var timeParts = time.split(':');

    // Transforma em segundos
    var seconds = (+timeParts[0]) * 3600 + (+timeParts[1]) * 60 + (+timeParts[2]);

    // Retorno
    return seconds;

}

// Manipulador de eventos de clique para iniciar ou pausar o cronômetro
$(document).on('click', '.task-play-time', function(){

    // Se estiver cronometrando
    if (isRunning) {
        
        clearInterval(timerInterval);
        isRunning = false;

        // Troca o ícone
        $('#icon-play-time').removeClass('fa-pause').addClass('fa-play');

    } else {

        // Obtem em segundos o tempo do timer
        var actualTime = timeToSeconds();

        // Obtem agora - tempo decorrido
        startTime = new Date().getTime() - actualTime * 1000;

        // Define intervalo a ser atualizado o cronometro
        timerInterval = setInterval(updateTimer, 1000);

        // Define como ativo
        isRunning = true;

        // Troca o ícone de Play
        $('#icon-play-time').removeClass('fa-play').addClass('fa-pause');

    }

    // Obtem dados
    var taskId = $(this).data('task');

    // Salva no BD
    $.ajax({
        url: globalUrl + '/core/projetos/tempo/registrar',
        type: 'POST',
        data: {task_id: taskId},
        success: function(response){

            // Obtém o item da lista kanban
            var iconRunning = $('[data-task="' + response['task'] + '"]').find('.fa-clock');
            
            // Ajusta no kanban
            if(response['isRunning']){
                iconRunning.addClass('clock-runing').show();
            } else {
                iconRunning.removeClass('clock-runing').show();
            }

        }
    });

});

// Função para atualizar o cronômetro
function updateTimer() {

    // Obtem o tempo atual
    var currentTime = new Date().getTime();

    // Obtem o tempo decorrido
    var elapsedTime = timeToSeconds();

    // Obtem a diferença
    time = currentTime - startTime;

    // Função para renderizar o tempo no formato HH:MM:SS
    if(isRunning){
        var hours = Math.floor(time / (1000 * 60 * 60));
        var minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((time % (1000 * 60)) / 1000);
        var formattedTime = 
            (hours < 10 ? "0" : "") + hours + ":" +
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;
        $('#timer-play-time').text(formattedTime);
    }

}
/**
 * Интервал обновления. задается в Settings.php,
 * передается через скрытый div с id="interval"
 */
function update_interval(){
    return $('#interval').text();
}

/**
 * Подсчет числа активных воркеров
 * случайное число добавляется для исключения кеширования - актуально для IE
 */
function check_workers(){
    setInterval(function(){
        $.ajax({
            url: 'ajax/count_workers.php',
            data: 'random='+Math.random(),
            type: 'GET',
            success: function(count){
                $('#count_workers').text(count);
            }
        });
    }, update_interval());
}

/**
 * Добавление воркера
 */
function add_worker(){
    $('#add_worker').click(function(){
            $.ajax({
                url: 'ajax/start_workers.php',
                data: 'random='+Math.random(),
                type: 'GET',
                success: function(msg){
                    jAlert(msg);
                }
            })
        }
    )
}

/**
 * Сброс очереди - запуск фейкового воркера
 */
function reset_queue(){
    $('#reset_queue').click(function(){
        jConfirm("Все задачи в очереди останутся необработанными\n Сбрасываем?", "Сброс очереди",function(r){
            if(r){
                $.ajax({
                url: 'ajax/reset_queue.php',
                data: 'random='+Math.random(),
                type: 'GET',
                success: function(msg){
                    jAlert(msg);
                    }
                })
            }
        })
    }
   )
}

/**
 * Остановка всех воркеров
 */
function stop_workers(){
    $('#stop_workers').click(function(){
        $.ajax({
            url: 'ajax/stop_workers.php',
            data: 'random='+Math.random(),
            type: 'GET',
            success: function(msg){
                jAlert(msg);
            }
        })
    }
    )
}

/**
 * Проверка ф-й, зарегистрированных на сервере очередей,
 * получение и отображение статусов задач, отображение кнопки сброса задачи
 */
function current_func_status(){
    setInterval(function(){
    $.ajax({
        url: 'ajax/functions_status.php',
        data: 'random='+Math.random(),
        dataType: 'JSON',
        success: function(json){
            $('#functions_progress').html('');
            $.each(json, function(key, val){

            var row = '<tr>' +
                    '<td class="gearman_func_name">' + val.func_name + '</td>' +
                    '<td class="gearman_func_value">' + val.in_queue + '</td>' +
                    '<td class="gearman_func_value">' + val.jobs_running + '</td>' +
                    '<td class="gearman_func_value">' + val.capable_workers + '</td>' +
                    '<td class="reset_task" style="background: url(view/img/delete.png) no-repeat center"></td>'+
                    '</tr>';
            $('#functions_progress').append(row);
            })
            /**
             * Вешаем обработку нажатия на элемент после его создания - ранее этих эл-тов просто нет
             * Ранее на всякий случай выше в коде использовалось unbind - нет нужды
             */
            $('.reset_task').bind('click', function(){
                var func_name = $(this).parent().children('td.gearman_func_name').text();
                $.ajax({
                    url: 'ajax/reset_task.php',
                    type: 'GET',
                    data: 'function_name='+func_name,
                    success: function(response){
                        jAlert(response);
                    }
                });
            })


        }
    })
    }, update_interval());
}



/**
 * Подкраска элементов лог-файла при наведении мыши.
 * Стиль - см. класс .row_on_mouse 
 */
function log_td_on_mouse(){
    var row_td = $('.log_row');
    row_td.mouseover(function(){
        $(this).addClass('row_on_mouse');
    });
    row_td.mouseleave(function(){
        $(this).removeClass('row_on_mouse');
    });
}

/**
 * Подкраска элементов управления при наведении мыши.
 * Стиль - см. класс .td_on_mouse
 */
function workers_td_on_mouse(){
    var worker_td = $('#workers_table td');
    worker_td.mouseover(function(){
        $(this).addClass('td_on_mouse');
    });
    worker_td.mouseleave(function(){
        $(this).removeClass('td_on_mouse');
    });
}

/**
 * Просмотр и обновление лог-файла
 */
function view_log(){
    setInterval(function(){
    $.ajax({
        url: 'ajax/log_change.php',
        data: 'random='+Math.random(),
        dataType: 'JSON',
        success: function(json){
            $.each(json, function(key, val){

            var row = '<tr>' +
                    '<td class="log_row">' + val + '</td>' +
                    '</tr>';
            $('#first_log_row').after(row);

            });
            log_td_on_mouse();

        }
    })
    }, update_interval());
}


$(document).ready(function(){
    check_workers();
    current_func_status();
    add_worker();
    stop_workers();
    view_log();
    reset_queue();
    workers_td_on_mouse();
})

$(document).ready(function() {

    $('.ip-adress').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        }
    });

    $(function() {
        $('.form-ip').validate({
            rules: {
                ip: {
                    required: true
                }
            },
            messages: {
                ip: {
                    required: "Поле IP обязательно к заполнению"
                }
            }
        });
    });
    var strokeCount = 0;
    $(".form-ip").submit(function(e) {
        // Получаем введенное занчение
        var ip = $('#ip-adress').val();
        // Прячем текст оповещения об ошибке
        $('#mail_error_message').addClass('d-none');
        $('#responseFromIpScan').addClass('d-none');

        // Проверка на кол-во октетов, не менее 4
        var oktet = ip.split('.');
        var oktet_count = oktet.length;
        if (oktet_count !== 4) {
            $('#mail_error_message').html('Кол-во октетов должно быть равным 4').removeClass('d-none');
            return false;
        }

        // Проверка на вхождение октетов в заданный диапозон
        for (var i = 0; i < oktet_count; i++) {
            var tmp = +oktet[i];
            if (!((tmp >= 0) && (tmp <= 255))) {
                $('#mail_error_message').html('Допустимый диапазон октета 255').removeClass('d-none');
                return false;
            }
        }

        var data = 'ip=' + ip,
            url = "../geo/getgeo.php";

        $.ajax({
            method: "POST",
            url: url,
            data: data,
            dataType: 'json',
            success: function(dt) {
                if (dt['success'] === 1) {
                    strokeCount++;
                    $('.table-result_inner').append(`
                        <tr>
                            <th scope="row">${strokeCount}</th>
                            <td>${dt['res']['dt_create']}</td>
                            <td>${dt['res']['dt_change']}</td>
                            <td>${dt['res']['ip_client']}</td>
                            <td>${dt['res']['ip_need']}</td>
                            <td>${dt['res']['country_from_response']}</td>
                            <td>json</td>
                        </tr>
                    `);
                }
            }
        });
        return false;
    });
});

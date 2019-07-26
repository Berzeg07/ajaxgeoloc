<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <h1 class="main-title">Определения геопозиции по IP-адресу</h1>
        <form class="form-ip">
            <div class="row">
                <div class="col-12">
                    <label for="ip-adress">Введите ваш IP адресс</label><br>
                    <input class="ip-adress" id="ip-adress" type="text" placeholder='xxx.xxx.xxx.xxx' name='ip' required><br>
                    <span class="alert-danger mess-error d-none" id='mail_error_message'>Сообщение</span>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Отправить</button>
                </div>
            </div>
        </form>

        <table class="table table-result">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Дата изменения</th>
                    <th scope="col">IP адрес клиента</th>
                    <th scope="col">IP адрес из формы</th>
                    <th scope="col">Страна</th>
                    <th scope="col">Ответ от сервиса</th>
                </tr>
            </thead>
            <tbody class="table-result_inner"></tbody>
        </table>
    </div>


    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/jquerymask/jquery.mask.min.js"></script>
    <script src="lib/jqueryvalidate/jquery.validate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>

</body>

</html>


<b>POST</b> api/create <br>
Создает нового сотрудника <br>
Параметры: email, password
Возвращает JSON формата `{
    "success": true,
    "data": {
        "email": "ivanov2@mail.ru",
        "updated_at": "2024-08-06T07:45:44.000000Z",
        "created_at": "2024-08-06T07:45:44.000000Z",
        "id": 1
    }
}`

<b>POST</b> api/accept-transaction <br>
Добавляет новую транзакцию <br>
Параметры: employee_id, hours

<b>GET</b> api/get-amount <br>
Возвращает суммы выплат по всем сотрудникам <br>
Параметры: нет <br>
Возвращает JSON формата `[ { employee_id : сумма выплат }, { employee_id : сумма выплат } ]`

<b>POST</b> api/payment <br>
Отмечает все транзакции погашенными <br>
Параметры: нет

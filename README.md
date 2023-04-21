## REST API для записной книжки


### `GET /api/v1/notebook/`
_- Получение всех записей_.

**Query parameters:**

- `page` - страница пагинации


***

### `POST /api/v1/notebook/`
_- Создание новой записи_

**Принимаемые поля (request):**

`full_name` - ФИО (обязательное поле)

`email` - Электронная почта (обязательное поле)

`company` - Компания

`phone_number` - Номер телефона (обязательное поле, 11 цифр)

`date_birth` - Дата рождения. Формат:```YYYY-MM-DD ```

`photo` - Фото. (файл, ```Content-Type: multipart/form-data```)

***

### `GET /api/v1/notebook/{id}`
_- Получение записи по id_.

**Parameters:**

- `id` - id записи

***

### `POST /api/v1/notebook/{id}`
_- Обновление записи по id_.

**Parameters:**

- `id` - id записи

**Принимаемые поля (request):**

`full_name` - ФИО (обязательное поле)

`email` - Электронная почта (обязательное поле)

`company` - Компания

`phone_number` - Номер телефона (обязательное поле, 11 цифр)

`date_birth` - Дата рождения. Формат:```YYYY-MM-DD ```

`photo` - Фото. (файл, ```Content-Type: multipart/form-data```)

***

### `DELETE /api/v1/notebook/{id}`
_- Удаление записи по id_.

**Parameters:**

- `id` - id записи

***

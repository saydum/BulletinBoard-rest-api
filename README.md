# Тестовое задание
Создать JSON API для сайта объявлений.

Необходимо создать сервис для хранения и подачи объявлений.
Объявления должны храниться в базе данных. Сервис должен предоставлять API, работающее поверх HTTP в формате JSON.

## Установка
```shell
git clone <repo> rest-api-app
cd rest-api-app

composer install

cp .env.example .env

alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'

# Запуск контейнеров
sail up -d

# Запуск миграции и генерации данных
sail artisan migrate --seed

# Запуск тестов
sail test
```

## API запросы
### Получение списка объявлений
- GET `/api/v1/bulletins`
    - **Параметры запроса:**
        - `sortBy:` поле для сортировки (price или created_at). 
        - `sortDirection:` направление сортировки (asc или desc). 
    - **Ответ:**
        - name,
        - main_image,
        - price.

### Получение конкретного объявления
- GET `/api/v1/bulletins/{bulletin}`
    - **Ответ:** 
        - name
        - main_image
        - price

### Создание объявления
- POST `/api/v1/bulletins`
    - **Тело запроса:**
        - name
        - description
        - images
        - price
    - **Ответ:**
        - `ID`

### Время на выполнения ТЗ
- Оцененное время: 4.30m
- Фактически затраченное время: 4.20m

# Тестовое задание
Создать JSON API для сайта объявлений.

Необходимо создать сервис для хранения и подачи объявлений. 
Объявления должны храниться в базе данных. Сервис должен предоставлять API, работающее поверх HTTP в формате JSON.

> Используем laravel 11.x + MySql 8 как БД.

3 метода: 
- получение списка объявлений, 
- получение одного объявления, 
- создание объявления.

**Валидация полей** 
- не больше 3 ссылок на фото, 
- описание не больше 1000 символов, 
- название не больше 200 символов.

1) Метод получения списка объявлений:
    - Нужна пагинация, на одной странице должно присутствовать 10 объявлений
    - Нужна возможность сортировки: по цене (возрастание/убывание) и по дате создания (возрастание/убывание)
    **Поля в ответе:** 
        - название объявления, 
        - ссылка на главное фото (первое в списке),
        - цена
2) Метод получения конкретного объявления:
    **Обязательные поля в ответе:** 
    - название объявления, 
    - цена, 
    - ссылка на главное фото
    - Опциональные поля (можно запросить, передав параметр fields): 
    - описание, ссылки на все фото
3) Метод создания объявления:
    - Принимает все вышеперечисленные поля: название, описание, несколько ссылок на фотографии (сами фото загружать никуда не требуется), цена
    - Возвращает ID созданного объявления и код результата (ошибка или успех)

4) Должны быть написаны unit тесты для backend части.
5) Сделать frontend на vuejs. В качестве оформления можно использовать любой css framework
6) Код должен быть выложен на github или gitlab.

> Срок выполнения задания: не более 2х дней от момента получения.

# Время:
- POMO (1 = 1ч 30м): | + 40m
- Оцененное время: 4.5ч
- Фактически затраченное время: ??

# Entity
**Bulletin**
- id            pk
- name          string
- price         decimal
- description   text
- images        text

# TASKS
**Backend**
## Init
- [x] init project backend
- [x] decomposition tasks

## 1. Create
- [x] create model
    **Result**
    - ID
    - HTTP CODE
- [x] Validate data
  - не больше 3 ссылок на фото,
  - описание не больше 1000 символов,
  - название не больше 200 символов.

- [x] create Exception
- [x] test for method create

## 2. Index
- [ ] method index get Bulletins
    - name
    - first image
    - price
    - HTTP CODE
  
- [ ] paginate
- [ ] filter by price and sorter (ASC/DESC)
- [ ] filter by date and sorter (ASC/DESC)
- [ ] create Exception
- [ ] test for method show

## 3. Show
- [ ] method get by id
    - name
    - first image
    - price
    - HTTP CODE
    - **Optional parameter (fields)**
        - description
        - all images
- [ ] create Exception
- [ ] test for method get by id

- [ ] testing rest api

## 4. FRONTEND
- [ ] create app vue.js and install dependents(bootstrap, axios)
- [ ] get all Bulletins
- [ ] Pagination
- [ ] Filter and sorter price/date
- [ ] get Bulletin by id
- [ ] creat Bulletin

## 5. Other
- [ ] create README
- [ ] create repository
- [ ] Send TZ

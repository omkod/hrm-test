1. В корне проекта выполнить **docker-compose up -d**
2. Войти к контейнер php **docker exec -it test_php bash**
3. Выполнить composer install
4. Скопировать .env.example в .env, установить параметры:
   DB_HOST=mysql
   DB_NAME=basic_db
   DB_USERNAME=basic_dbu
   DB_PASSWORD=E9x2W9c5
5. Установить права на директорию runtime: **chmod -R 777 runtime/**
6. Применить миграции: **yii migrate**
7. Применить миграции модуля user-management: **yii migrate --migrationPath=lib/module-user-management/migrations/**
8. Сайт доступен на http://127.0.0.1:8000/
9. Employee api:
   GET http://127.0.0.1:8000/employee
   GET http://127.0.0.1:8000/employee/{id}
   POST http://127.0.0.1:8000/employee
   PUT http://127.0.0.1:8000/employee/{id}
   DELETE http://127.0.0.1:8000/employee/{id}
10. При создании пользователя в http://127.0.0.1:8000/user-management/user/create создается письмо в runtime/mail
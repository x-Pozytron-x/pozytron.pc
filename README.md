# Pozytron Portfolio | Fullstack Developer Showcase

![Project Preview](frontend/public/preview.jpg) <!-- Добавьте скриншот позже -->

**Комбинированное портфолио с React-фронтендом и PHP-бэкендом**, включающее:
- Публичную часть с проектами
- Админку для управления контентом
- Систему хранения сообщений из контактной формы

## 🚀 Технологический стек
### Frontend
- React 18 (SPA)
- React Router v6
- Axios для API-запросов
- SCSS/Styled Components

### Backend
- PHP 5.6 (с поддержкой MySQLi)
- REST-like API
- Базовая JWT-аутентификация

### База данных
- MySQL 5.7+
- Таблицы: projects, messages, users

## 📦 Установка и запуск

### Бэкенд (PHP)
```bash
cd backend
cp config.example.php config.php # Настройте доступы к БД
php -S localhost:8080 -t .
```

### Фронтенд (React)
```bash
cd frontend
npm install
npm start # Запустится на http://localhost:3000
```

### Админка (React)
```bash
cd admin
npm install
npm start # Запустится на http://localhost:3001
```

## 🌐 API Endpoints
| Метод | Путь               | Описание                  |
|-------|--------------------|---------------------------|
| GET   | /api/projects      | Получить все проекты      |
| POST  | /api/projects      | Добавить проект (админ)   |
| GET   | /api/messages      | Получить сообщения (админ)|

## 🗂 Структура проекта
```
/project-root
│
├── /backend                     # Бэкенд (PHP)
│   ├── /config                  # Конфигурационные файлы
│   ├── /controllers             # Контроллеры для обработки API-запросов
│   ├── /models                  # Модели для работы с БД
│   ├── /public                  # Папка для публичных файлов (например, index.php)
│   ├── /routes                  # Маршруты для API
│   └── /utils                   # Утилитарные функции (например, для аутентификации)
│
├── /frontend                    # Фронтенд (React)
│   ├── /admin                   # Админка
│   │   ├── /components          # Компоненты админки
│   │   ├── /pages               # Страницы для админки (например, ProjectsPage)
│   │   ├── /services            # Сервисы для API-запросов в админке
│   │   └── /styles              # Стили для админки (если они специфичные для админки)
│   │
│   ├── /client                  # Основной сайт
│   │   ├── /components          # Компоненты для сайта
│   │   ├── /pages               # Страницы сайта
│   │   ├── /services            # Сервисы для API-запросов на сайт
│   │   └── /styles              # Стили для сайта
│   │
│   ├── /public                  # Публичные файлы (например, favicon)
│   ├── /src                     # Исходный код React (все компоненты и логику)
│   ├── /build                   # Скомпилированные файлы для деплоя
│   └── /node_modules            # Папка для зависимостей фронтенда
│
└── /node_modules                # Зависимости для бэкенда (если используются, например, для API)
```

## 🔒 Доступы для админки
По умолчанию:
- Логин: `admin`
- Пароль: `password123` (⚠️ изменить перед деплоем!)

## 📝 Планы по развитию
- [ ] Добавить мультиязычность
- [ ] Реализовать загрузку изображений
- [ ] Переход на PHP 8.2+


## 📄 Лицензия
MIT © 2023 [Stetsenko Vitalii] | [pozytron.dev]



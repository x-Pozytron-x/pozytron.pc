# Pozytron Portfolio | Fullstack Developer Showcase

<!-- ![Project Preview](frontend/public/preview.jpg)   -->

**Комбинированное портфолио с React-фронтендом и PHP-бэкендом**, включающее:
- Публичную часть с проектами
- Админку для управления контентом
- Систему хранения сообщений из контактной формы

## 🚀 Технологический стек
### Frontend
- React 18 (SPA)
- React Router v6
- SCSS/Styled Components

### Backend
- PHP 5.6 (с поддержкой MySQLi)

### База данных
- MySQL 5.7+
- Таблицы: projects, messages, users, config

## 📦 Установка и запуск

### Бэкенд (PHP)
```bash
cd backend
cp config.example.php config.php # Настройте доступы к БД
php -S localhost:8000 -t backend/public http://localhost:8000
```

### Фронтенд (React)
```bash
cd frontend
npm install
npm start # Запустится на http://localhost:3000
``` 

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
│
├── /frontend                    # Фронтенд (React)
│   ├── /build                   # Скомпилированные файлы для деплоя
│   ├── /node_modules            # Папка для зависимостей фронтенда
│   ├── /public                  # Публичные файлы (например, favicon)
│   ├── /src                     # Исходный код React (все компоненты и логику)
│   │   ├── /admin               # Админка 
│   │   │   ├── /components      # Компоненты админки
│   │   │   ├── /context
│   │   │   ├── /pages           # Страницы для админки (например, Settings, LoginPage)
│   │   │   ├── /services        # Сервисы для API-запросов в админке
│   │   │   ├── /styles          # Стили для админки 
│   │   │   └── /AdminApp.js     # "Точка входа" для админки
│   │   │
│   │   ├── /client              # Основной сайт
│   │   │   ├── /components      # Компоненты для сайта
│   │   │   ├── /pages           # Страницы сайта (например, Home, About)
│   │   │   ├── /services        # Сервисы для API-запросов в сайт
│   │   │   └── /styles          # Стили для сайта 
│   │   │   └── /index.js        # "Точка входа" для сайта

```

## 🔒 Доступы для админки
По умолчанию:
- Логин: `admin`
- Пароль: `123` (⚠️ изменить перед деплоем!)

## 📝 Планы по развитию
- [ ] Добавить мультиязычность
- [ ] Реализовать загрузку изображений
- [ ] Переход на PHP 8.2+


## 📄 Лицензия
MIT © 2023 [Stetsenko Vitalii] | [pozytron.dev]
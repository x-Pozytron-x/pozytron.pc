# Pozytron Portfolio | Fullstack Developer Showcase

<!-- ![Project Preview](frontend/public/preview.jpg) -->

**A combined portfolio with a React frontend and PHP backend**, featuring:
- A public section with projects
- An admin panel for content management
- A system for storing messages from the contact form

## 🚀 Tech Stack
### Frontend
- React 18 (SPA)
- React Router v6
- SCSS/Styled Components

### Backend
- PHP 5.6 (with MySQLi support)

### Database
- MySQL 5.7+
- Tables: projects, messages, users, config

## 📦 Installation and Setup

### Backend (PHP)
```bash
cd backend
cp config.example.php config.php # Configure database credentials
php -S localhost:8000 -t backend/public http://localhost:8000
```

### Frontend (React)
```bash
cd frontend
npm install
npm start # Runs on http://localhost:3000
``` 

## 🗂 Project Structure
```
/project-root
│
├── /backend                     # Backend (PHP)
│   ├── /config                  # Configuration files
│   ├── /controllers             # Controllers for handling API requests
│   ├── /models                  # Models for database interactions
│   ├── /public                  # Public files (e.g., index.php)
│   ├── /routes                  # API routes
│
├── /frontend                    # Frontend (React)
│   ├── /build                   # Compiled files for deployment
│   ├── /node_modules            # Frontend dependencies
│   ├── /public                  # Public files (e.g., favicon)
│   ├── /src                     # React source code (components and logic)
│   │   ├── /admin               # Admin panel
│   │   │   ├── /components      # Admin panel components
│   │   │   ├── /context         # Context for state management
│   │   │   ├── /pages           # Admin panel pages (e.g., Settings, LoginPage)
│   │   │   ├── /services        # Services for API requests in the admin panel
│   │   │   ├── /styles          # Styles for the admin panel
│   │   │   └── /AdminApp.js     # Entry point for the admin panel
│   │   │
│   │   ├── /client              # Main website
│   │   │   ├── /components      # Website components
│   │   │   ├── /pages           # Website pages (e.g., Home, About)
│   │   │   ├── /services        # Services for API requests in the website
│   │   │   ├── /styles          # Styles for the website
│   │   │   └── /index.js        # Entry point for the website
```

## 🔒 Admin Panel Access
Default login:
- Username: admin
- Password: 123 (⚠️ Change this before deployment!)

## 📝 Roadmap
- [ ] Add multilingual support
- [ ] Implement portfolio/image uploading
- [ ] Upgrade to PHP 8.2+


## 📄 License
MIT © 2023 [Stetsenko Vitalii] | [pozytron.dev]
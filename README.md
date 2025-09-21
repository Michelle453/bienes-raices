# 🏠 Real Estate – MVC Project  

This is a web application for managing **real estate** (properties, sellers, users, etc.), built with **PHP, MySQL, HTML, CSS, JavaScript, Composer, and npm**, following the **MVC (Model–View–Controller)** architecture pattern.  

---

## 📂 Project Structure  

The folder organization follows the MVC pattern:  
```
BIENES_Raices_MVC
├── controllers/       # Controllers: business logic
├── models/            # Models: database interaction
├── views/             # Views: templates and pages
├── includes/          # Config & helpers
│   ├── config/        # Database connection
│   └── templates/     # Reusable components
├── public/            # Public files (index.php, compiled assets)
├── src/               # Development resources (scss, js, images)
├── vendor/            # Composer dependencies (ignored in git)
├── node_modules/      # npm dependencies (ignored in git)
├── .gitignore
├── composer.json
├── package.json
├── bienes_raices.sql  # Database script
└── README.md
```
---

## ⚡ Tech Stack  

- **Backend:** PHP 8+, MySQL  
- **Frontend:** HTML5, CSS3 (SCSS), JavaScript  
- **Architecture:** MVC (Model – View – Controller)  
- **Dependencies:** Composer, npm  
- **Build Tools:** Gulp for assets compilation  
- **Email Service:** Mailtrap for testing email sending  
---

## 🚀 Installation & Setup  

1. **Clone the repository**  
```bash
git clone https://github.com/your-username/real-estate-mvc.git
cd real-estate-mvc
```
2. **Install Composer and npm dependencies**
```bash
composer install
npm install
```
3. **Set up the database**
   - Create a new MySQL database.
   - Import the bienes_raices.sql file.
   - Configure the connection in:
     includes/config/database.php
4. **Configure email (Mailtrap)**
   - Create a free account at Mailtrap
   - Get your username and password from Mailtrap.
   - Update them in the PaginasController.php inside the contacto method.
    
5. **Compile assets (SCSS & JS)**
```bash
   gulp
```
6. **Run the local server**
```bash
   php -S localhost:3000 -t public
```
---

## ✨ Features

- 🔑 User authentication (login/logout).
- 🏡 Property management (create, edit, delete, list).
- 👨‍💼 Seller management.
- 📄 Dynamic views with reusable templates.
- 🎨 SCSS styles compiled automatically with Gulp.
- 🗄️ Data persistence with MySQL and ActiveRecord.
- 📧 Contact form with Mailtrap integration.
  
---
## 👤 Admin Credentials

Use the following credentials to log in as Administrator:
  - Email: correo@correo.com
  - Password: 123456
---
⭐ If you liked this project, don’t forget to give it a star on GitHub! ⭐  

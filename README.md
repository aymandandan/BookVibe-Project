# BookVibe - Online Bookstore Platform

## 📖 Overview
BookVibe is a Laravel-based online bookstore platform that allows users to browse books, manage carts/wishlists, and enables admins to handle inventory, authors, and categories. Built with **Laravel 10**, **Tailwind CSS**, and **MySQL**.

---

## 🚀 Quick Start

### Prerequisites
- PHP ≥ 8.1
- Composer
- MySQL
- Node.js ≥ 16

### Installation
1. **Clone/Unzip the Project**  
2. **Install Dependencies**:
   ```bash
   composer install
   npm install && npm run build
   ```
3. **Configure Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Setup Database**:
   - Create a MySQL database named `bookvibe`.
   - Update `.env` with your credentials:
     ```env
     DB_DATABASE=bookvibe
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```
5. **Migrate & Seed**:
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

### Run the App
```bash
php artisan serve
npm run dev
```
Access: `http://localhost:8000`

---

## 🛠 Troubleshooting: "View [view] not found" Error

### Common Causes & Fixes
1. **Missing Composer Dependencies**  
   Run:
   ```bash
   composer install
   composer dump-autoload
   ```

2. **Cached Configuration**  
   Clear cached files:
   ```bash
   php artisan view:clear
   php artisan config:clear
   php artisan cache:clear
   ```

3. **View File Not Found**  
   - Verify the view exists at `resources/views/[view].blade.php` (case-sensitive).  
   - Ensure the route/controller references the correct lowercase path (e.g., `home.index` → `resources/views/home/index.blade.php`).

4. **File Permissions**  
   Grant write access:
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

5. **Database Issues**  
   Ensure the database is properly imported and `.env` matches your MySQL credentials.

---

## 🔐 Default Accounts
    Run Database Seed to add the default admin account:
    ```bash
    php artisan db:seed
    ```
| Role   | Email                 | Password     |
|--------|-----------------------|--------------|
| Admin  | adminTest@example.com | admin@ccount |

---

## 📌 Key Features
- **Admin Dashboard**: Manage books, authors, categories.
- **User Cart/Wishlist**: Add/remove items, adjust quantities.
- **Responsive UI**: Mobile-friendly design.

---

## 📜 License
[MIT License](LICENSE)

---

## ❓ Support
For issues not resolved above, contact:  
**Email**: [your.email@domain.com]  
**Phone**: [+1 234 567 890]  


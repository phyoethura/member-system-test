# Laravel Project

## Description

This is a Laravel-based web application. Follow the instructions below to set up the project on your local machine.

---

## Requirements

- PHP >= 8.1  
- Composer  
- MySQL  
- Node.js and npm (if using frontend assets like Vite)  

---

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-project.git
cd your-project
```

### 2. Configure the .env File

Copy the example .env file and set up your database credentials:

```bash
cp .env.example .env
```

Update these lines in the `.env` file:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```

⚠️ Make sure the database exists in your MySQL server.

### 3. Install Dependencies

```bash
composer install
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Start the Development Server

```bash
php artisan serve
```

The project will be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## (Optional) Frontend Setup

If your project uses frontend assets with Vite:

```bash
npm install
npm run dev
```

---

## License

This project is open-source and available under the MIT License.
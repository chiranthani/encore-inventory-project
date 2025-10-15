# Encore Inventory Project

A Laravel-based UI prototype for an inventory management system using dummy JSON data (no database connection required).

---

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/chiranthani/encore-inventory-project.git
cd encore-inventory-project
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Setup

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

> **Note:**  
> - Set the `SESSION_DRIVER` value in your `.env` file to `file`.  
> - This project **does not use a database** — all data is loaded from **dummy JSON files** for UI demonstration purposes.

### 4. Link Storage

```bash
php artisan storage:link
```

---
## User Interface Preview
![Encore Inventory UI](https://github.com/user-attachments/assets/0859749e-a5fa-44c7-a50e-f941fe6f1713)

# 📦 Expense Management Module (Laravel 12)

A modular, scalable Expense Management system built using Laravel 12, following clean architecture and ERP-friendly design principles.

---

## 🚀 Features

- Modular architecture (using `nwidart/laravel-modules`)
- UUID primary keys
- Full CRUD for expenses
- Filtering by category and date range
- Enum for category field
- API-only routing with proper HTTP codes
- Service Layer and Form Requests
- Laravel Resource & ResourceCollection
- ExpenseCreated event (via Observer)
- Notification when new expense is created (database channel)
- PHPUnit feature test
- Scribe (OpenAPI/Swagger) integration

---

## 🏗️ Module Structure

```
Modules/
└── Expenses/
    ├── app/
    │   ├── Services/
    │   ├── Enums/
    │   ├── Transformers/
    │   ├── Helpers/
    │   ├── Observers/
    │   ├── Providers/
    │   ├── Http/
    │   │   ├── Controllers/
    │   │   │   └── Api/V1/
    │   │   └── Requests/
    │   └── Models/
    │       └── Expense.php
    ├── config/
    │   └── config.php
    ├── database/
    │   ├── factories/
    │   ├── migrations/
    │   └── seeders/
    ├── resources/
    │   └── views/
    ├── routes/
    │   └── api.php
    ├── tests/
    │   ├── Feature/
    │   └── Unit/
    ├── composer.json
    └── module.json
```

---

## ⚙️ Setup Instructions

```bash
# Clone the repo
$ git clone https://github.com/your-org/expense-module.git
$ cd expense-module

# Install dependencies
$ composer install

# Copy .env and generate key
$ cp .env.example .env
$ php artisan key:generate

# Configure database in .env then run migrations
$ php artisan migrate

# Install and publish Scribe (for API docs)
$ composer require knuckleswtf/scribe --dev
$ php artisan vendor:publish --tag=scribe-config
$ php artisan scribe:generate

# Optional: seed some data
$ php artisan db:seed

# Run server
$ php artisan serve
```

---

## 📡 API Endpoints

| Method | Endpoint              | Description                          |
|--------|-----------------------|--------------------------------------|
| GET    | /api/v1/expenses      | List all expenses with filters       |
| POST   | /api/v1/expenses      | Create a new expense                 |
| PUT    | /api/v1/expenses/{id} | Update an existing expense           |
| DELETE | /api/v1/expenses/{id} | Delete an expense                    |

You can pass `category`, `from_date`, and `to_date` as query params for filtering.


---

## 🧪 Feature Test

Test file: `Modules/Expenses/Tests/Feature/ExpenseTest.php`

```php
/** @test */
public function it_can_filter_expenses_by_category_and_date_range()
{
    ...
    $this->getJson('/api/v1/expenses?category=food&from_date=2024-01-01')->assertOk();
}
```

Run tests:
```bash
php artisan test
```

---

## 📝 Assumptions

- No authentication is required.
- `category` values are enum-based, not tied to a database table.
- Notifications are sent via `database` channel for simplicity.
- Admin receives notifications (you may replace this with actual users).

---

## ⏱️ Time Spent

| Task                          | Time    |
|-------------------------------|---------|
| Module Scaffolding            | ~10 min |
| CRUD + Validation             | ~10 min |
| Service Layer + Resources     | ~15 min |
| Filtering Logic               | ~10 min |
| Observer + Notification       | ~10 min |
| PHPUnit Test                  | ~10 min |
| Swagger Docs (Scribe)         | ~10 min |
| Documentation & Review        | ~10 min |
| **Total**                     | **~1.25 hrs** |

---

## 📚 Resources

- Laravel 12.x Documentation
- Laravel Modules (nwidart/laravel-modules)
- Scribe API Docs
- PHPUnit

---

**Maintained by:** [Mohammed Ahmed Arafat](mailto:mohammed@example.com)

Ready for review ✅

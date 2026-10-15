# INFO — custom neon sign requests

INFO is a small PHP/MySQL prototype for requesting custom neon signs. Customers can ask for a shop sign such as **DONERS** or a personalized name sign such as **Erlan & Zhazira**. They enter the wording, where the sign will be used, a glow color, and contact details. Staff follow up to confirm the final design; the site does not take payment.

This version builds on the original [INFO repository](https://github.com/LordGibrat/INFO) with a redesigned customer experience and neon sign preview.

Preview: [landing page](docs/home.png) · [order page](docs/order.png)

## Version 2 interface

The interface now uses a responsive neon-studio design across the landing page, account forms, order form, and admin pages. The landing page shows business and personalized examples. The order form includes a live digital preview of the neon wording and selected glow color. It is an illustrative preview; staff still confirm the final sign after submission.

The HTML pages can be previewed with any static server. Submitting forms or viewing the admin pages requires PHP and the existing MySQL database. The existing form endpoints, database names, and field names have been retained. Registration now directs users to login, and successful orders return to the correctly cased `MainPage.html` path.

## What it includes

- Registration with form validation.
- User login and session-based pages.
- An order-request page with a live neon preview.
- Administrator login and administration pages.
- A simple HTML/CSS interface.

The project is intentionally compact and is useful as an early web-development exercise showing forms, PHP request handling, sessions, and MySQL access.

## Main files

- `MainPage.html` — entry page.
- `Login.html` / `Login.php` — user login flow.
- `Registrarion.html` / `Registration.php` — registration flow.
- `Ordering.html` / `Ordering.php` — order flow.
- `adminlogin.php` / `loginprocessadmin.php` — administrator login.
- `adminlogout.php` — clears the administrator session.
- `adminpage.php` — administrator page.
- `style.css` — shared styling.
- `order-preview.js` — client-side neon preview; it does not submit or store data.
- `favicon.svg` — INFO brand icon.

## Local setup

The PHP files expect a local MySQL server at `127.0.0.1` and a database named `dbgiba`. Create the required tables before running the application, then serve the repository through Apache, PHP’s development server, or another PHP-capable environment.

```bash
php -S 127.0.0.1:8000
```

Open <http://127.0.0.1:8000/MainPage.html>.

To enable the administrator login, set `INFO_ADMIN_ID` and `INFO_ADMIN_PASSWORD` in the PHP server environment before starting it. For example, in PowerShell:

```powershell
$env:INFO_ADMIN_ID = 'your-admin-id'
$env:INFO_ADMIN_PASSWORD = 'choose-a-strong-password'
php -S 127.0.0.1:8000
```

Do not commit a real password or a `.env` file to the repository.

## Security note

This is an educational prototype, not a production-ready service. Before deployment it needs user password hashing, CSRF protection, stronger session settings, authorization checks throughout, and removal of development database credentials from source code. The admin orders page checks for an admin session, and admin credentials are read from environment variables, but those changes alone do not secure the application.

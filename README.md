# XUL Project Digital Library (PHP)

University project migrated from frontend-only to a PHP structure for XAMPP.

## Structure

```text
/xul_project_dbms
|-- index.php                    # Root redirect to public entry
|-- includes/
|   |-- bootstrap.php            # Session + helper config
|   `-- auth.php                 # Auth, user storage, route protection
|-- public/                      # Publicly accessible files
|   |-- index.php
|   |-- assets/
|   |   `-- css/style.css
|   |-- auth/
|   |   |-- login.php
|   |   |-- register.php
|   |   `-- logout.php
|   `-- pages/
|       |-- about.php
|       |-- contact.php
|       |-- catalog.php
|       `-- book.php
`-- private/                     # Protected pages (auth required)
    |-- dashboard.php
    |-- profile.php
    `-- data/users.json
```

## Key Points

- No `.html` files remain in the project.
- All pages are now `.php`.
- Public pages are under `public/`.
- Protected pages are under `private/` and guarded by `require_auth()`.
- Login/register now use PHP sessions and a local JSON user store.
- Legacy frontend directories (`assets/`, `js/`, and old `pages/`) were removed from the project root after migration.

## Run (XAMPP)

1. Start Apache in XAMPP.
2. Open [http://localhost/xul_project_dbms/](http://localhost/xul_project_dbms/).
3. Register a user, then login to access private pages.
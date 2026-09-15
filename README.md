# Orphanage Database Management System

A PHP and MySQL web project for organizing orphanage records and presenting programs, sponsorship opportunities, and donation forms. The interface combines public-facing pages with administrative record-management screens.

## Features

- Child records and sponsored/unsponsored galleries.
- Program, sponsor, and donor records.
- Donation and gift submissions.
- Member registration/login, feedback, and newsletter records.
- Administrative pages for managing the stored information.

Donation forms record submitted information in the database. Their presence does not establish a working payment-gateway integration or confirm that a payment has been received.

## Run locally

Use a local PHP web server with `mysqli` and a MySQL/MariaDB database.

1. Clone this repository into your development server's document root, for example `htdocs/orphanage/`.
2. Create an empty local database named `orphan` and import [database/orphan.sql](database/orphan.sql).
3. Set your local connection details in [db-connection.php](db-connection.php).
4. Start the web server and database, then open `http://localhost/orphanage/`.
5. Open `login.php` for the login page. The original project documents `admin` / `admin` as demo credentials; use them only with the sample local database and replace them before any shared deployment.

A particular PHP/MySQL version is not pinned, and this documentation pass did not run the application against a fresh database.

## Project map

| Path | Purpose |
| --- | --- |
| `index.php` | Public landing page |
| `login.php`, `signup.php` | Member access |
| `admin/` | Administrative screens |
| `components/` | Shared page elements |
| `database/orphan.sql` | Schema and starter records |
| `db-connection.php` | Database connection |
| `semantic/` | Bundled UI assets and their notices |

## Safe use and limitations

Use synthetic records while evaluating this project. Children's records and donor/member information must not be placed in a public demo or committed to source control.

Before real deployment, review authorization on every administrative action, replace default credentials, modernize password storage, use prepared SQL statements, add CSRF protection and output escaping, and validate all submissions. Any payment integration needs its own implementation and verification.

The current login code compares passwords using SQL `SHA(...)`; this is legacy authentication code, not evidence of production-grade security. This README is a source-based guide, not a security audit or deployment approval.

Preserve the license and attribution notices included with bundled third-party assets.

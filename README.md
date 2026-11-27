# Nuyasir (نُيسر)

A zero-interest tuition financing portal built for universities: students apply once, upload a funding document, and track their status by application number, while two independent reviewers move each application through a two-stage approval pipeline.

> **[ HOME SCREENSHOT: replace this line with `![Home](docs/screenshots/home.png)` ]**

## What it does

Nuyasir funds all or part of tuition at 0% profit for students admitted into paid programs: Master's, Higher Diploma, Applied Diploma, and bridging programs. An applicant fills one form, uploads a funding document, and can check their status at any time with nothing but an application number.

The process has four stages:

1. **تعبئة النماذج**: applicant completes the form and uploads a funding document.
2. **التدقيق والمراجعة**: review starts the moment the form is submitted.
3. **تحديث الحالة**: status updates to accepted, rejected, or needs changes.
4. **بدء إيداع التمويل**: once accepted, the financing body begins the deposit.

> **[ FORM SCREENSHOT: replace this line with `![Form](docs/screenshots/form.png)` ]**

## Workflow: two reviewers, one pipeline

Every application moves through two independent reviewers before funding starts: the university's own queue first, then an external financing partner. Each stage has its own acceptance status, so a preliminary yes from one side is never mistaken for the other's final sign-off.

| Stage | Role | Status | What happens |
|---|---|---|---|
| `/table` | University reviewer | `pending` | New applications land here. A reviewer accepts, rejects, or sends back for changes. |
| handoff | n/a | `قبول مبدأي` (preliminary) | Preliminary acceptance moves the application off the university queue and onto the funding partner's. |
| `/mslak` | Funding partner | `قبول نهائي` (final) | The funding partner gives final sign-off. Funding deposit begins after this. |

> **[ TABLE SCREENSHOT: replace this line with `![Review queue](docs/screenshots/table.png)` ]**
>
> **[ DETAILS MODAL SCREENSHOT: replace this line with `![Application detail](docs/screenshots/details-modal.png)` ]**

## Tech stack

The technology underneath is plain and well-established on purpose: Laravel on the backend, Blade templates for the pages, MySQL for storage.

- Laravel 10
- PHP 8
- MySQL
- Blade
- Laravel Breeze auth
- Bootstrap 5
- Vite + Tailwind
- Role-based middleware

## A closer look

> **[ MOBILE SCREENSHOT: replace this line with `![Mobile home](docs/screenshots/mobile-home.png)` ]**

## Running it locally

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
# set DB_* values in .env, then:
php artisan migrate
php artisan storage:link
php artisan serve
npm run dev
```

University and funding-partner names and contact details in this repository are placeholders. Swap them with real values before deploying for an actual institution.

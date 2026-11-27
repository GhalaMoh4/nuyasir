# Nuyasir (نُيسر)

A zero-interest tuition financing portal built for universities: students apply once, upload a funding document, and track their status by application number, while two independent reviewers move each application through a two-stage approval pipeline.

> <img width="2216" height="1625" alt="0891068B-FFDB-49DA-8BF4-B9735EA2C83D" src="https://github.com/user-attachments/assets/7bbb5fc8-f057-4ec8-bb6f-01041e2e6f8c" />
> <img width="2157" height="1656" alt="69BDF8B6-7D05-47BE-9EF2-62FCC15D2474" src="https://github.com/user-attachments/assets/6f898d43-3b51-48a3-bb2c-574ed3293e53" />

## What it does

Nuyasir funds all or part of tuition at 0% profit for students admitted into paid programs: Master's, Higher Diploma, Applied Diploma, and bridging programs. An applicant fills one form, uploads a funding document, and can check their status at any time with nothing but an application number.

The process has four stages:

1. **تعبئة النماذج**: applicant completes the form and uploads a funding document.
2. **التدقيق والمراجعة**: review starts the moment the form is submitted.
3. **تحديث الحالة**: status updates to accepted, rejected, or needs changes.
4. **بدء إيداع التمويل**: once accepted, the financing body begins the deposit.

> <img width="2033" height="1647" alt="2F0BF345-4C8E-4CC2-BAB4-B09DF8144F03" src="https://github.com/user-attachments/assets/460d92a2-b048-4f45-bad6-978708a8fe83" />




## Workflow: two reviewers, one pipeline

Every application moves through two independent reviewers before funding starts: the university's own queue first, then an external financing partner. Each stage has its own acceptance status, so a preliminary yes from one side is never mistaken for the other's final sign-off.

| Stage | Role | Status | What happens |
|---|---|---|---|
| `/table` | University reviewer | `pending` | New applications land here. A reviewer accepts, rejects, or sends back for changes. |
| handoff | n/a | `قبول مبدأي` (preliminary) | Preliminary acceptance moves the application off the university queue and onto the funding partner's. |
| `/mslak` | Funding partner | `قبول نهائي` (final) | The funding partner gives final sign-off. Funding deposit begins after this. |

> <img width="3024" height="1722" alt="C9AE13AB-01A8-4CFA-8005-E4889EC10C78" src="https://github.com/user-attachments/assets/b0d6a73a-bd4e-446e-b8b9-ed10e0205099" />

> <img width="2201" height="1714" alt="ACAA2D53-D764-45E0-A54E-26B656108CFA" src="https://github.com/user-attachments/assets/2c47c818-0ea4-4a50-9c78-4d7cf650a1fb" />


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

> <img width="300" height="600" alt="image" src="https://github.com/user-attachments/assets/8a543539-3ef6-49ec-938b-b51f3f68d819" />
> <img width="300" height="600" alt="image" src="https://github.com/user-attachments/assets/a09e0516-b72d-4047-bc3b-2f2f0f406222" />
> <img width="300" height="600" alt="image" src="https://github.com/user-attachments/assets/27ad929f-254d-4646-a2f8-743d41c8a9c1" />




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



# Laravel Live Security

Laravel Live Security is a lightweight package that tracks suspicious or high‑risk user activity in real time.  
It logs actions such as rapid form submissions, multiple login attempts, unauthorized route hits, and abnormal usage patterns — helping you monitor your Laravel application without third‑party services.

Ideal for:

- Admin panels
- Membership sites
- SaaS apps
- Login systems
- API security monitoring

## 🚀 Features

- Tracks risky user behavior automatically
- Logs:

    - Rapid repeat requests
    - Multiple failures
    - Suspicious route access
    - IP + User context

- Real‑time tracking
- Publishable log storage
- Customizable thresholds
- No external API dependency
- Optional (opt‑in) anonymous telemetry
- Works in Laravel 10, 11, and 12

---

## 📦 Installation

```bash
composer require monircse403/laravel-live-security

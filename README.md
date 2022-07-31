# BINUS Web Course

![GitHub deployments](https://img.shields.io/github/deployments/fauzanelka/binuswebcourse/production?label=vercel&logo=vercel)

This repository is intended for demonstration of BINUS Web Programming Course module.

## Prerequisites

- PHP >= 8.1
- Composer

## Quick Start

Clone this repository

```bash
git clone https://github.com/fauzanelka/binuswebcourse.git
```

Install dependencies via Composer

```bash
composer install
```

Setup your environment variables

```bash
cp .env.example .env
```

Run migration

```bash
php artisan migrate:refresh --seed
```

Run server (development)

```bash
php artisan serve
```

Open your browser and go to [http://localhost:8000](http://localhost:8000)

## Modules

### Route Path

Individual Assignment #1: `/module/personal/1`

Individual Assignment #2: `/module/personal/2` 

Secret code: secret

Team Assignment #1: `/module/team/1`

Team Assignment #2: `/module/team/1`

Team Assignment #3: `/module/team/3` (Not developed yet)

Team Assignment #4: `/module/team/4` (Not developed yet)

### Demo User

- Email: admin@binuswebcourse.vercel.app

  Password: admin
 
- Email: user@binuswebcourse.vercel.app

  Password: user

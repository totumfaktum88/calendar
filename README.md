# Telepítési instrukciók

### .env fájl másolása a példa állományból

Linux
```bash
cp .env.example .env
```

Windows
```bash
copy .env.example .env
```

### Composer dependenciák telepítése

PHP verzió: 8.1 vagy magasabb

```bash
composer install
```

### Backend inicializálása
```bash
php artisan key:generate
php artisan migrate:fresh --seed
php artisan ziggy:generate
```

#### Npm dependenciák telepítése

- Node.js verzió: 18 vagy nagyobb
- NPM verzió: 8 vagy nagyobb

```bash
npm install
```

#### Frontend forrás buildelése
```bash
npm run build
```

#### Frontend forrás vite serverként futtatása
```bash
npm run dev
```
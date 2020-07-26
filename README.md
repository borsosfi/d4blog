# Működési feltételek
---------------------

- Internet hozzáférés (Composer, npm csomagok és további online függőségek)
- XAMPP: https://www.apachefriends.org/download.html
- legalább PHP 7.2.5 verzió (Laravel 7)
- NPM: https://www.npmjs.com/get-npm
- Composer: https://getcomposer.org/download/

# Telepítés lépései
-------------------

1. `cp .env.example .env` (**Unix**) (`.env` fájl másolása a `.env.example` fájl alapján)
1. `copy .env.example .env` (**Windows**) (`.env` fájl másolása a `.env.example` fájl alapján)
1. `composer install` (Composer csomag függőségek telepítése)
1. `npm install` (NPM csomag függőségek telepítése)
1. `php artisan key:generate` (`APP_KEY` kulcs elkészítése a `.env` fájlba)
1. `php artisan migrate` (adatbázis migrálása)
1. `composer dump-autoload` (composer autoload fájlok elkészítése)
1. `php artisan db:seed` (adatbázis adatokkal való feltöltése)
1. `php artisan config:cache` (Laravel konfigurációk eltárolása cache-be)
1. `npm run prod` (NPM csomagok production build-elése)
1. `php artisan serve` (Laravel projekt webes kiszolgálása saját gépen)
1. böngésző megnyitása ezen webcímmel: http://127.0.0.1:8000
1. admin felület (http://127.0.0.1:8000/admin) hozzáférési adatok: `user@d4blog.local` / `password`


# Képernyőfotók
---------------

## Blog felület
---------------

### Blog bejegyzések listája
![Blog bejegyzések listája](d4blog_blog_screenshot_01.png)

### Egy blog bejegyzés
![Egy blog bejegyzés](d4blog_blog_screenshot_02.png)

### Blog bejegyzések szűrése címke alapján
![Blog bejegyzések szűrése címke alapján](d4blog_blog_screenshot_03.png)


## Admin felület
----------------


### Bejelentkezés az admin felületre
![Bejelentkezés az admin felületre](d4blog_login_screenshot_01.png)


## Blog admin felület
---------------------


### Admin felület: blog bejegyzések listája
![Admin felület: blog bejegyzések listája](d4blog_admin_blog_screenshot_01.png)

### Admin felület: blog bejegyzés hozzáadása
![Admin felület: blog bejegyzés hozzáadása](d4blog_admin_blog_screenshot_02.png)

### Admin felület: blog bejegyzés szerkesztése
![Admin felület: blog bejegyzés szerkesztése](d4blog_admin_blog_screenshot_03.png)

### Admin felület: blog bejegyzés törlése
![Admin felület: blog bejegyzés törlése](d4blog_admin_blog_screenshot_04.png)


## Címkék admin felület
-----------------------


### Admin felület: címkék listája
![Admin felület: címkék listája](d4blog_admin_tag_screenshot_01.png)

### Admin felület: címke hozzáadása
![Admin felület: címke hozzáadása](d4blog_admin_tag_screenshot_02.png)

### Admin felület: címke szerkesztése
![Admin felület: címke szerkesztése](d4blog_admin_tag_screenshot_03.png)

### Admin felület: címke törlése
![Admin felület: címke törlése](d4blog_admin_tag_screenshot_04.png)

## Licence
----------

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons Licenc" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
Ez a mű a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Nevezd meg! - Így add tovább! 4.0 Nemzetközi Licenc</a> feltételeinek megfelelően felhasználható.

**Készítette: Borsos Szilárd**
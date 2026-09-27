# Tasks for Today Management System

IT0049 Technical Summative Assessment 1. Developer: John Xavier Tumbokon. The application uses CodeIgniter 4, PHP, and MySQL. It has four pages: `/` (today only), `/tasks` (all tasks ordered by date), `/profile` (one demo user), and `/about` (static developer page).

## Important first step

This ZIP contains **all custom project files**, database SQL, and a Windows installation script. The CodeIgniter framework and `vendor` dependencies are installed by Composer; they are not included in the ZIP. Do not upload this source ZIP directly and expect it to run. Use the installer below to assemble the complete project first.

## Run on Windows with XAMPP

1. Install XAMPP and [Composer for Windows](https://getcomposer.org/download/). Open XAMPP Control Panel and start **Apache** and **MySQL**.
2. Extract this ZIP anywhere, for example `Downloads\tasks-for-today`.
3. Open PowerShell in the extracted `tasks-for-today` folder (in File Explorer, click the address bar, type `powershell`, and press Enter).
4. Type `powershell -ExecutionPolicy Bypass -File .\setup-windows.ps1` and press Enter. Wait for Composer to finish. It creates `C:\xampp\htdocs\tasks-for-today` and puts all the custom files into the CodeIgniter starter project. If that destination already exists, rename the existing folder before trying again.
5. Open `http://localhost/phpmyadmin/`. Click **New**, create an empty database named `tasks_for_today` with `utf8mb4_unicode_ci` collation, select it, click **Import**, choose `C:\xampp\htdocs\tasks-for-today\database\tasks_for_today.sql`, then click **Import/Go**. Import into an empty database only once.
6. Open `C:\xampp\htdocs\tasks-for-today\.env` in Notepad. The provided values assume the usual XAMPP `root` account with no password. If yours differs, edit the credentials. Keep this exact local URL: `app.baseURL = 'http://localhost/tasks-for-today/public/'` (single quotes, trailing slash; do not paste `app.baseURL =` twice). Keep `app.appTimezone = 'Asia/Manila'`.
7. Visit `http://localhost/tasks-for-today/public/`, then check `/tasks`, `/profile`, and `/about` using the navigation links. The Welcome page should show four tasks and the Task List eight tasks immediately after import. Today's count can differ later because the seeded dates are fixed at import time.

If Composer says `ext-intl` or `ext-mbstring` is missing, open `C:\xampp\php\php.ini`, remove the leading `;` on the relevant `extension=intl` or `extension=mbstring` line, save, restart Apache and reopen PowerShell. Composer must use XAMPP's PHP or a PHP with matching extensions. If Apache uses another port, update the port in `.env` too.

## Publish the complete project to GitHub

1. Create a new **private** repository named `tasks-for-today` on GitHub. If your professor needs access, invite them or choose a public repository for submission.
2. In `C:\xampp\htdocs\tasks-for-today`, verify hidden files are visible. **Never commit `.env`**. The `.gitignore` excludes `.env` and `vendor/`; do include `composer.json`, `composer.lock`, `app`, `public`, `writable`, `database`, `.htaccess`, and `README.md`.
3. Upload the complete assembled project folder contents through GitHub's **Add file → Upload files**, or use Git: `git init`, `git add .`, `git commit -m "Build tasks for today"`, `git branch -M main`, `git remote add origin YOUR_REPOSITORY_URL`, `git push -u origin main`. Run those commands inside the assembled folder, replacing the repository URL.
4. Check the repository contains `database/tasks_for_today.sql`, `app/Controllers/Pages.php`, both models, views, and the starter project's `composer.json`. GitHub is source storage; it does not host the running PHP application.

## Host the working copy on InfinityFree

1. Make sure it works locally first. Your assembled folder must contain `vendor/` and `public/index.php`.
2. Sign up at [InfinityFree](https://www.infinityfree.com/), create a hosting account and select a free subdomain. Open its control panel and note its MySQL **hostname**, **database username**, and **account password**. These are not necessarily `localhost`, `root`, or your InfinityFree login password.
3. In **MySQL Databases**, create a database. Write down the full generated database name including its account prefix. Open phpMyAdmin for that database; select it, then **Import** `database/tasks_for_today.sql`. Import into an empty database only once.
4. On your PC, edit the assembled project's `.env` to use `CI_ENVIRONMENT = production`, `app.baseURL = 'https://YOUR-SUBDOMAIN.example/tasks-for-today/public/'`, `app.appTimezone = 'Asia/Manila'`, and the **exact** InfinityFree MySQL hostname, full database name, username, and password shown in its control panel. Keep `database.default.DBDriver = MySQLi`. Replace the example URL with your actual domain and keep the trailing `/`. If your site only works over HTTP initially, use `http://` until HTTPS is set up.
5. In InfinityFree's File Manager (or FTP), open your domain's `htdocs` folder and create a folder named `tasks-for-today`. Upload the **contents of the assembled** `C:\xampp\htdocs\tasks-for-today` folder there, including `app/`, `public/`, `vendor/`, `writable/`, `.env` and `.htaccess`. File managers may hide dotfiles; enable hidden files or use FTP and verify `.env` was uploaded. Uploading one ZIP may require extracting it with a supported file manager; FTP is often easier for many vendor files. The folder must end up as `htdocs/tasks-for-today/public/index.php`, not `htdocs/tasks-for-today/tasks-for-today/public/index.php`.
6. Visit `https://YOUR-SUBDOMAIN.example/tasks-for-today/public/`. Follow the links to verify `/tasks`, `/profile`, and `/about`. Submit this exact working URL and the GitHub repository URL to your professor. Do not put your database password in GitHub.

**Hosting security:** On shared hosting, the framework's `app/`, `.env`, and `vendor/` should ideally be outside the web root. This folder based arrangement relies on the included root `.htaccess` to deny access to private folders and files. Before sharing the hosted link, check that `/tasks-for-today/.env` and `/tasks-for-today/app/Config/Database.php` return 403 or 404. If either shows file contents, stop using that deployment and move the framework directories outside `htdocs` or use hosting with a configurable document root. Do not upload `database/tasks_for_today.sql` to a public GitHub repository if you replace the sample records with private data.

**Common fixes:** A database error means the InfinityFree MySQL hostname, full prefixed name, username, or password is wrong, or the SQL import was skipped. A 404 on other pages usually means the upload missed `public/.htaccess` or `app/Config/Routes.php`; check `public/index.php` and `public/.htaccess` exist. A 500 may mean `vendor/` is missing, PHP extensions are unavailable, or `writable/` cannot be written; look at `writable/logs` and your hosting error log. The server and PHP timezone must agree with `Asia/Manila` for today's tasks: the application uses PHP `date()` while the SQL seed uses MySQL `CURDATE()` at import time; if the hosting database clock differs near midnight, adjust seed dates after import in phpMyAdmin.

## Source checklist

- `app/Controllers/Pages.php`: all four page actions.
- `app/Models/TaskModel.php` and `UserModel.php`: MySQL data access.
- `app/Config/Routes.php`: page routes.
- `app/Views`: layout and four views, with output escaping.
- `database/tasks_for_today.sql`: exact requested schema, eight task rows on three dates, one user.
- `.env.example`: local configuration template; installed `.env` is private.
- `setup-windows.ps1`: builds the full XAMPP project from the official CodeIgniter starter via Composer.

The assessment requests two submission URLs. They cannot be filled in until you publish the GitHub repository and deploy to your own InfinityFree account.

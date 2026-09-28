website link: https://jatumbokontasksfortoday.infy.click/tasks-for-today/public/index.php

# Tasks for Today Management System

IT0049 Technical Summative Assessment 1. Developer: John Xavier Tumbokon. The application uses CodeIgniter 4, PHP, and MySQL. It has four pages: `/` (today only), `/tasks` (all tasks ordered by date), `/profile` (one demo user), and `/about` (static developer page).


## Source checklist

- `app/Controllers/Pages.php`: all four page actions.
- `app/Models/TaskModel.php` and `UserModel.php`: MySQL data access.
- `app/Config/Routes.php`: page routes.
- `app/Views`: layout and four views, with output escaping.
- `database/tasks_for_today.sql`: exact requested schema, eight task rows on three dates, one user.
- `.env.example`: local configuration template; installed `.env` is private.
- `setup-windows.ps1`: builds the full XAMPP project from the official CodeIgniter starter via Composer.

The assessment requests two submission URLs. They cannot be filled in until you publish the GitHub repository and deploy to your own InfinityFree account.

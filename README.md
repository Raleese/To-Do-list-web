# To-Do List Web

A simple to-do list web app built with PHP, JavaScript, CSS, and MySQL. You can add tasks, mark them as complete, and delete them from the list.

## Features

- Add a new to-do item
- Mark an item as complete or incomplete
- Delete an item
- Persists data in a MySQL database
- Automatically creates the database and table on first run

## Requirements

- PHP 8 or newer
- MySQL or MariaDB
- A local web server such as Apache, Nginx, or PHP's built-in server

## Database Setup

The app bootstraps its own database and table when it starts. You only need a running MySQL or MariaDB server and valid credentials in [db.php](db.php).

If your database name, host, or port are different, update [config.php](config.php).

## Run Locally

1. Clone or download the project.
2. Make sure the database credentials in [db.php](db.php) match your local MySQL setup.
3. Start a PHP server from the folder that contains the project:

```bash
php -S localhost:8000 -t To-Do-list-web
```

4. Open [http://localhost:8000](http://localhost:8000) in your browser.

If you are already inside the project folder, run `php -S localhost:8000` instead.

## Project Structure

- [index.php](index.php) handles form submission and renders the list.
- [db.php](db.php) contains the database wrapper.
- [config.php](config.php) stores database connection settings.
- [elements/](elements/) contains the page layout and UI fragments.
- [functions/buttons.js](functions/buttons.js) handles add-complete-delete behavior in the browser.
- [styles/style.css](styles/style.css) contains the page styling.

## Notes

- New items are limited to 50 characters by the input field.
- Completed items are stored in the database and visually crossed out in the UI.

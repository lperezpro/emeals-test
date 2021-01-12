# eMeals Test

## System dependencies

- PHP 7.4
- MariaDB 10.5.8 or equivalent

## Application dependencies

```
none
```

## Database Configuration

- On `config/database.php`

- Change as needed

## Database Schema

```
data/schema.sql
```

## Database initialization

- Schema file already includes
  `CREATE DATABASE emeals;`
  `USE emeals;`

- Change as needed

## Deployment instructions

- There is no need to load schema before first use. It checks if database and table exists if is not it creates it.

## Additional Notes

- Configured to run on Apache server and use `mod_rewrite`.
- If it is to be run on another server or without `mod_rewrite` change references of files from `file_name`
  to `file_name.php`
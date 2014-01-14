Villa Buena Onda WordPress Install
====================

Requirements
------------
PHP 5.3  
MySQL (5.1 or 5.5)

Files
------------
Copy all files from ``/src/*`` to your root directory.  
_You must remove all previous files.  The WordPres upgrade to 3.8 requires all files to be replaced_  

**Permissions**  
Permissions will vary on how you manage your environment.  I recommend only ``/wp-content/uploads/`` have write permissions.  If you want install themes or other plugins using the WordPress admin, you will need to give the whole ``/wp-content/`` write permissions.

Database
------------
SQL dump is located as the only file under ``/db/``.  There is a folder ``/db/old/`` that contains previous versions of the database, these are not required.  

**Connection String**  
Change the database connection settings in ``/wp-config.php``.  Below is a sample of the configuration changes needed:  

```php
define('DB_NAME', 'vbo_database_name');

/** MySQL database username */
define('DB_USER', 'vbo_database_username');

/** MySQL database password */
define('DB_PASSWORD', 'vbo_database_password');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

```

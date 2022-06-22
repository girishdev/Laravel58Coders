Mysql Commands:
For Export:
    mysqldump -u root -p Laravel58Coders > laravel58coders.sql

For Import:
    mysql -u root -p Laravel58Coders < import_file.sql

Granting Permission:
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root';
    ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
    FLUSH PRIVILEGES;

Mysql Server Start/Stop/Restart:
    sudo service mysql stop;
    sudo service mysql start;
    service mysql restart

# 'Code & Care' | Laravel Task



##Download Packages
    - Open cmd and run 'composer install'
## DB
    1. Create database 'hasher'
    2. Choose necessary parameters in .env file
    3. Open cmd and run next:
        - php artisan migrate
        - php artisan db:seed
   
##Scheduling
    TXML file will be is in a xml/users.xml
    For Scheduling you must create a cron job, and run
    * * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
# SSASoft Backoffice

This is written for Singapore Soka Association for their daily needs in office operation.
This will version 2 using laravel and quasar framework with mariadb.

## Prerequisites
### Installation of the Docker Container into development computer
1. Refer to the below link to do the installation of docker container
   https://github.com/chankl78/alpinenginxphp.git


## Installation
### Install with necessary data and tools to start the development of the backoffice v2
1. Install arcanedev/log-viewer so that we can view the logs
   ```
   composer require arcanedev/log-viewer:~4.7.0
   ```

   - You can refer to the below link for more information in installation
   - https://github.com/ARCANEDEV/LogViewer/blob/master/_docs/1.Installation-and-Setup.md

   - ``` php artisan log-viewer:publish``` -> To run the log-viewer
   - In the resources/views/vendor/log-viewer/bootstrap-4/_master.blade.php
      ```
      <title>LogViewer - Created by ARCANEDEV</title>

      to change to as below or whatever title for the page you want

      <title>SSASoft Logs - BackOffice</title>
      ```
   - In the config/log-viewer
      ```
      'route'         => [
        'enabled'    => true,

        'attributes' => [
            'prefix'     => '***CHANGE THIS prefix***',

            'middleware' => env('ARCANEDEV_LOGVIEWER_MIDDLEWARE') ? explode(',', env('ARCANEDEV_LOGVIEWER_MIDDLEWARE')) : null,
        ],

      ```
   - In the browser, type below to view the logs
      ```
      http://127.0.0.1:8882/ssasoftlog-viewer/
      ```

2. Loading the tables in MariaDB (Please ensure you have setup your DB in .env correctly before running below command)
   ```
   php artisan migrate
   ```


   or


   ```
   php artisan migrate:fresh --seed
   ```

   
   The above code is to delete all the tables and install a fresh new database with seed data.

3. Loading the default data for MariaDB
   ```
   php artisan db:seed
   ```

4. Loading Dummy Data for SSA Members (If you need it.  It is not included inside the above seed)
   ```
   php artisan db:seed --class=MembersmSSASeeder
   ```

5. If the docker container does not run quasar, run the following command in docker
   ```
   npm install
   npm install @quasar/cli
   npm install @vue/cli
   npm install vue-router
   ```
   
6. Because Laravel needs index.php to works, so need to re-copy the file over from another folder.
   ```
   cp /var/www/html/defaultpublic/* /var/www/html/public/
   ```

7. As we are using JWT for login & registration, we need to run the following code to generate a key.
   ```
   php artisan jwt:secret
   ```

## Laravel License

The Laravel framework is open-sourced software licensed under the MIT license.

## Quasar License

Copyright (c) 2015-present Razvan Stoenescu MIT License

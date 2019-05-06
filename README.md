# electronics_shop_management_system
shop management system,electronics_shop_management_system,electronics
<ul>
<li>After cloning this repository, go to the root folder, run the following command/s,
<pre>
    - composer update
    - cp .env.example .env</pre>
</li>
    
<li>Use SQL File From Folder For Dummy Data,
<pre>
    - Download SQL file from SQL folder and restore into database
</li>

<li>Update the database name, username & password. You can check the config/laratrust_seeder.php to create your own roles and permission level with users. This is only for seeding purpose and quick view.
<pre>
    - php artisan cache:clear
    - php artisan config:cache
    - php artisan view:clear
    - php artisan clear-compiled
    - truncate -s 0 storage/logs/laravel.log
    - php artisan key:generate</pre> </li>

</ul>

## Last Work
Now you are ready to check out

<pre>
    - php artisan serve
</pre>

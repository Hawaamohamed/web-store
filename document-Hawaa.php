<?php
 php artisan make:controler users -r   // make resource controller with functions(add-edit-delete----) (crud)

 php artisan make:model News -m      // make model & migration together

 php artisan migrate:fresh        // drop all tables from database and re run migration again

 php artisan migrate:refresh        // reset and re run migration again


 php artisan migrate:rollback        // delete all tables from database

 php artisan migrate:reset        // rollball  for last migration done

 php artisan make:seeder News2          // for add data in databast tables

 php artisan db:seed      //save seeder


 ?>

<?php

use Illuminate\Database\Seeder;
use App\News2;
class News2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){ 

            $add = new News2;
            $add->title = 'news title';
            $add->save();
        }
    }
}

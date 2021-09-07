<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
		    ['id' => '1', 'name'=>'Dashboard', 'route' => 'Dashboard', 'icon' => 'class="side-menu__icon si si-screen-desktop"'],
		    ['id' => '2', 'name'=>'Blog', 'route' => 'blog.index', 'icon' => 'class="fab fa-blogger"'],
		    ['id' => '3', 'name'=>'Users', 'route' => 'users.index', 'icon' => 'class="fas fa-users"'],
            ['id' => '4', 'name'=>'Role', 'route' => 'role.index', 'icon' => 'class="fe fe-shield"'],
            ['id' => '5', 'name'=>'Tag', 'route' => 'tag.index', 'icon' => 'class="fas fa-tags"'],
            ['id' => '6', 'name'=>'Product', 'route' => 'product.index', 'icon' => 'class="fa fa-product-hunt"'],
            ['id' => '7', 'name'=>'FAQ', 'route' => 'faq.index', 'icon' => 'class="fa fa-question-circle"'],
		    ['id' => '8', 'name'=>'General Setting', 'route' => 'generalsetting.index', 'icon' => 'class="fa fa-cog"'],
		];
        DB::table('module')->insert($data);
    }
}

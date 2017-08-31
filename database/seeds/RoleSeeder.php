<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder{

    public function run(){
        DB::table('roles')->delete();

        Role::create([
            'name'   => 'cliente'
        ]);

        Role::create([
            'name'   => 'ventas'
        ]);

        Role::create([
            'name'   => 'compras'
        ]);
        Role::create([
            'name'   => 'staff'
        ]);
        Role::create([
            'name'   => 'servicio'
        ]);

        Role::create([
            'name'   => 'administrator'
        ]);



    }
}
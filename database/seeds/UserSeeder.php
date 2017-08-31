<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();
        $adminRole = Role::whereName('administrator')->first();
        $user1 = User::create(array(
            'name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'john@admin.com',
            'password'      => Hash::make('admin123'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'email'

        ));
        $user1->assignRole($adminRole);
        /* */
        factory(App\Models\User::class,50)
        ->create()
        ->each(function ($u) {
            $userCliente = Role::whereName('cliente')->first();
            $u->assignRole($userCliente);
        });

        factory(App\Models\User::class,10)
        ->create()
        ->each(function ($u) {
            $userCliente = Role::whereName('ventas')->first();
            $u->assignRole($userCliente);
        });

        factory(App\Models\User::class,10)
        ->create()
        ->each(function ($u) {
            $userCliente = Role::whereName('compras')->first();
            $u->assignRole($userCliente);
        });
        factory(App\Models\User::class,10)
        ->create()
        ->each(function ($u) {
            $userCliente = Role::whereName('staff')->first();
            $u->assignRole($userCliente);
        });
        factory(App\Models\User::class,10)
        ->create()
        ->each(function ($u) {
            $userCliente = Role::whereName('servicio')->first();
            $u->assignRole($userCliente);
        });
    }
}
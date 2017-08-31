<?php

#rutas de Login Social

$s = 'social.';

Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);

Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Auth::routes(['login' => 'auth.login']);

#Rutas Paginas Frontend

Route::get('/','\App\Http\Controllers\Front\HomeController@index');

Route::get('linea-negocio/{id}','\App\Http\Controllers\Front\HomeController@getLineasNegocios');
Route::get('tipo-producto/{id}','\App\Http\Controllers\Front\HomeController@getTipoProductos');
Route::get('linea-negocio/{linea}/{id}','\App\Http\Controllers\Front\HomeController@getProducto');
Route::get('/noticias','\App\Http\Controllers\Front\HomeController@getNoticias');
Route::get('/nosotros','\App\Http\Controllers\Front\HomeController@getNosotros');
Route::get('/aviso-contenido','\App\Http\Controllers\Front\HomeController@getAviso');
Route::get('/terminos-contenido','\App\Http\Controllers\Front\HomeController@getTerminos');
Route::get('/contacto','\App\Http\Controllers\Front\HomeController@getContacto');
Route::get('code','\App\Http\Controllers\Front\HomeController@getArtisan');

Route::get('cps/{id}','\App\Http\Controllers\Front\HomeController@getCp');
Route::get('whishlist/{producto_id}','\App\Http\Controllers\Front\HomeController@postWhishlist');
Route::get('wishlist-delete/{wishlist_id}','\App\Http\Controllers\Front\HomeController@postWhishlistDelete');
Route::post('newsletter','\App\Http\Controllers\Front\HomeController@postSaveNewsletter');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/mi-cuenta', ['as'=>'user.mi-cuenta','uses'=> '\App\Http\Controllers\Front\HomeController@getMiCuenta']);
	Route::post('/update/edit_profile', ['as'=>'user.edit-user','uses'=> '\App\Http\Controllers\Front\UserFrontController@postSaveUser']);
});



  ////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////SHOPING CART//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/add-cart/{id}','\App\Http\Controllers\Front\ShopingCartController@addCart');
Route::post('/delete-cart/{id}','\App\Http\Controllers\Front\ShopingCartController@deleteCart');
Route::post('/update-cart/{id}/{val}','\App\Http\Controllers\Front\ShopingCartController@updateCart');
Route::get('/pago-seguro','\App\Http\Controllers\Front\ShopingCartController@pedidoCart');

  ///////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////END SHOPING CART/////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////



#Rutas de pruebas

Route::get('/test', ['as'=>'test.file','uses'=> '\App\Http\Controllers\Front\HomeController@postTest']);
Route::get('/ok', ['as'=>'test.file','uses'=> '\App\Http\Controllers\Front\HomeController@postOk']);

 

Route::get('/test', function () { 


        $adminRole = \App\Models\Role::whereName('administrator')->first();
        $user1 = \App\Models\User::create(array(
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
        
        
       /* $user1 = \App\Models\User::find(1);*/
        $dd = new \App\Models\Admin\DatoFacturacion;
        $dd->user_id = $user1->id;
        $dd->save();

        $de = new \App\Models\Admin\DatoEnvio;
        $de->user_id = $user1->id;
        $de->save();
});


<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'hello world';
    return view('welcome',compact('helloWorld'));
})->name('home');
Route::get('/model',function(){
    //$products=\App\Product::all();//select * from products
    //$user = new \App\User();

   /* $user = \App\User::find(1);
    $user->name = 'Teste2';
    $user->email = 'teste2@gmail.com';
    $user->password = bcrypt('123');
    $user->save();

    //return $products;
    \App\User::all(); -> retorna todos os usuarios do banco
    \App\User::find(1); -> retorna o usuario com base no id
    \App\User::where('name','Prof. Graciela Kutch')->get(); //select from users where name = '';
    \App\User::paginate(10); ->paginação
    */

    //Mass assignment
     /*$user = \App\User::create(
         [
            'name'=>'Adnan',
            'email'=>'ad@gmail.com',
            'password'=>bcrypt('123')
         ]
     );
     dd($user);*/

    //Mass update
   /* $user = \App\User::find(42);
    $user->update(
        [
            'name'=>'Adnan A.A'
        ]//true ou false
    );
    */
    //dd($user);
    //$user = \App\User::find(4);
    //dd($user->store());//objeto unico (store)

    //pegar os produtos da loja
    //$loja = \App\Store::find(1);
    //return $loja->products()->where('id',1)->get();

    //return \App\User::all();

    //criar uma loja para um usuário
    /*$user = \App\User::find(10);
    $store =$user->store()->create(
        [
            'name'=> 'loja teste',
            'description'=> 'loja teste de informatica',
            'mobile_phone'=> '99999-999',
            'phone'=> '99999-9999',
            'slug'=>'loja-teste',
        ]
        );
    dd($store);*/
    //criar um produto para uma loja
       /* $store = \App\Store::find(41);
        $product=$store->products()->create(
            [
                'name'=>'Notebook Dell',
                'description'=>'core i5 8gb',
                'body'=>'qualquer coisa',
                'price'=>2999.70,
                'slug'=>'notebook-dell',
            ]
            );
            dd($product);*/
    //criar uma categoria
   /*\App\Category::create(
        [
            'name'=>'Gamers',
            'slug'=>'gamers'
        ]
        );
        \App\Category::create(
            [
                'name'=>'Notebooks',
                'slug'=>'notebooks'
            ]
            );
            return \App\Category::all();*/

    //adicionar um produto para uma categoria ou vice-versa
    $product = \App\Product::find(16);
    //dd($product->categories()->attach([1,2]));

    return $product->categories;
});

Route::group(['middleware'=>['auth']], function()
{
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function()
    {
       /* Route::prefix('stores')->name('stores.')->group(function()
            {
                Route::get('','StoreController@index')->name('index');
                Route::get('create','StoreController@create')->name('create');
                Route::post('store','StoreController@store')->name('store');
                Route::get('{store}/edit','StoreController@edit')->name('edit');
                Route::post('update/{store}','StoreController@update')->name('update');
                Route::get('destroy/{store}','StoreController@destroy')->name('destroy');
            }
        );*/
        Route::resource('stores','StoreController');
        Route::resource('products','ProductController');
    });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

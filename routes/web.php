 <?php

    use Illuminate\Support\Facades\Route;

    //ADMIN
    Route::get('/Admin/manajerpengguna', 'App\Http\Controllers\manajerpenggunaController@manajerpengguna')
        ->name('manajerpengguna');

    Route::get('/logapp', 'App\Http\Controllers\logactivityController@xx')
        ->name('logactivity');


    Route::get('/cvarkhi', 'App\Http\Controllers\cvArkhiController@xx')
        ->name('cvarkhi');


    Route::POST('/update', 'App\Http\Controllers\manajerpenggunaController@update')
        ->name('updateuser');
    Route::POST('/createuser', 'App\Http\Controllers\manajerpenggunaController@store')
        ->name('create');
    Route::POST('/reallydelete', 'App\Http\Controllers\manajerpenggunaController@hapusperm')
        ->name('reallydelete');
    Route::POST('/reallydeactivated', 'App\Http\Controllers\manajerpenggunaController@deactivatedx')
        ->name('reallydeactivated');
    Route::POST('/activatedtheuser', 'App\Http\Controllers\manajerpenggunaController@activatedx')
        ->name('activatedtheuser');

    //Master Material
    Route::get('/Admin/mastermaterial', 'App\Http\Controllers\materialController@m_material')
        ->name('m_material');
    Route::POST('/chg/tmbhmaterial', 'App\Http\Controllers\materialController@TambahMaterial')
        ->name('tmbhmaterial');
    Route::post('/chg/ubahmaterial', 'App\Http\Controllers\materialController@UpdateMaterial')
        ->name('updatematerial');
    Route::post('/chg/hapusmaterial', 'App\Http\Controllers\materialController@deletematerial')
        ->name('deletematerial');

    //Master Pelanggan
    Route::get('/Admin/mastrpelanggan', 'App\Http\Controllers\pelangganController@m_pelanggan')
        ->name('mastrpelanggan');
    Route::post('/ubahpelanggan', 'App\Http\Controllers\pelangganController@updet')
        ->name('ubahm_pelanggan');
    Route::post('/hapuspelanggan', 'App\Http\Controllers\pelangganController@delete')
        ->name('hapuspelanggan');
    Route::post('/tambahpelanggan', 'App\Http\Controllers\pelangganController@tambahpelanggan')
        ->name('tambahpelanggan');


        //master supplier
Route::get('/Admin/mastersupplier', 'App\Http\Controllers\supplierController@m_supplier')
    ->name('mastersupplier');
Route::post('/ubahsupplier', 'App\Http\Controllers\supplierController@updet')
    ->name('ubahsupplier');
Route::post('/hapussupplier', 'App\Http\Controllers\supplierController@delete')
    ->name('hapussupplier');
Route::post('/tambahsupplier', 'App\Http\Controllers\supplierController@tambahsupplier')
    ->name('tambahsupplier');
    Route::get('/awtokomplet2', 'App\Http\Controllers\materialController@pilihsupplier')
        ->name('bisakomplit2');

    //AUTH
    Route::get('/', 'App\Http\Controllers\loginsController@login')
        ->name('login');
    Route::get('/Logout', 'App\Http\Controllers\loginsController@logout')
        ->name('logout');

    Route::post('/postlogin', 'App\Http\Controllers\loginsController@postlogin')
        ->name('postlogin');

    Route::post('/menjaditamu', 'App\Http\Controllers\loginsController@posttamu')
        ->name('menjaditamu');


    //Profil
    Route::get('/profil', 'App\Http\Controllers\profilsayaController@profil')
        ->name('profil');
    Route::post('/postupdateprofile', 'App\Http\Controllers\profilsayaController@update')
        ->name('updateprofile');

    Route::get('/testdisplay', function () {
        $x = app('firebase.firestore')->database()->collection('mini-log')->document('c41ba8ff752c4910a73c')->snapshot();
       dd($x);
    });




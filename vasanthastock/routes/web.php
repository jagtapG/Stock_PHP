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
    return view('login');
})->name('login');

Route::post('dologin','MaterialEntryController@login');

Route::middleware(['auth'])->group(function () {

    Route::get('topbar', function () {
        return view('navbar-header');
    });

    Route::get('importCsv', function () {
        return view('importCsv');
    });

    Route::get('sidebar', function () {
        return view('navbar-sidemenu');
    });
    Route::get('material', function () {
        return view('materialEntry');
    });
    Route::get('header', function () {
        return view('header');
    });

    Route::get('plantentry', function () {
        return view('plantEntry');
    });
    Route::get('help', function () {
        return view('help');
    });
    Route::get('login', function () {
        return view('login');
    });

    Route::post('save',"MaterialEntryController@insert");
    Route::get('materialreport','MaterialEntryController@getRecords');

    Route::get('centralStoreEdit/{centralId}', 'MaterialEntryController@centralStoreEdit');
    Route::post('centralStoreUpdate', 'MaterialEntryController@centralStoreUpdate');

    Route::post('insert',"MaterialEntryController@plantData");
    Route::get('plantreport','MaterialEntryController@plantRecords');

    Route::get('usages','MaterialEntryController@usagesRecords');
    //Route::get('test/{id}', 'MaterialEntryController@getData');

    Route::get('CentralStoreId/{plant}', 'MaterialEntryController@getPlantData');
    Route::get('substore/{subplant}', 'MaterialEntryController@subStore');

    Route::get('subStoreIssue/{subStoreId}', 'MaterialEntryController@subStoreIssue');
    Route::get('useMaterial/{id}', 'MaterialEntryController@editPlant');

    Route::post('useMaterialRecord', 'MaterialEntryController@useMaterialRecord');
    Route::get('selectPlant/{pltName}', 'MaterialEntryController@selectPlant');

    Route::get('selectMatName/{matName}', 'MaterialEntryController@selectMatName');
    Route::post('updateMaterial', 'MaterialEntryController@updateMaterials');

    Route::get('addedstockreoprt', 'MaterialEntryController@addedStockReport');
    Route::post('villa', 'MaterialEntryController@getVillaData');

    Route::get('villareport', 'MaterialEntryController@getVillaReport');
    Route::get('subStoreReport', 'MaterialEntryController@subStoreReport');

    //Route::get('dailyreport', 'MaterialEntryController@dailyReport');
    Route::get('materialWiseReport', 'MaterialEntryController@materialWiseReport');

    Route::get('matWiseReport/{id}', 'MaterialEntryController@matWiseData');
    Route::post('datesearch', 'MaterialEntryController@dateSearch');

    Route::post('substoredatesearch', 'MaterialEntryController@subStoreDateSearch');
    Route::post('villadatesearch', 'MaterialEntryController@villaDateSearch');

    Route::get('report', 'MaterialEntryController@getReport');
    //Route::post('importCsv', 'MaterialEntryController@importCsv'); 

    Route::get('importCsv', 'MaterialEntryController@list');
    Route::post('product-import', 'MaterialEntryController@productsImport');
    //Route::get('product-export/{type}', 'MaterialEntryController@productsExport')->name('product.export');

    Route::get('issueImport', 'MaterialEntryController@issueImport');
    Route::post('issue-import', 'MaterialEntryController@getIssueImport'); 

    Route::get('cronreport', 'MaterialEntryController@cronReport');

});

Route::get('logout', 'MaterialEntryController@logout');




Route::get('app', function () {
    return view('extendLayout');
});
Route::get('extend', function () {
    return view('extendLayout');
});


/*Route::get('demo', function () {
    return view('demo');
});*/
Route::get('demo','MaterialEntryController@demoData');
Route::get('fetch_data/{val}','MaterialEntryController@demoData');

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

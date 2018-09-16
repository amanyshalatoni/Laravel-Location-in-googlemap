<?php

Route::get('/', function () {
    return redirect('/login');
});

Route::get("/admin","HomeController@index");
Route::get("/admin/home/changepassword","Admin\HomeController@changepassword");
Route::post("/admin/home/changepassword","Admin\HomeController@postChangepassword");

Route::resource("/admin/admin","Admin\AdminController");
Route::get("/admin/admin/{id}/delete","Admin\AdminController@destroy");
Route::get("/admin/admin/active/{id}","Admin\AdminController@active");


//Ajax هنا 
Route::resource("/admin/adminajax","Admin\AdminajaxController");
Route::get("/admin/adminajax/{id}/delete","Admin\AdminajaxController@destroy");
Route::get("/admin/adminajax/active/{id}","Admin\AdminajaxController@active");
Route::post("/admin/adminajax/AjaxDT","Admin\AdminajaxController@AjaxDT");


Route::get("/admin/municipality/{id}/delete","Admin\municipalityController@destroy");
Route::get("/admin/municipality/active/{id}","Admin\municipalityController@active");
Route::resource("/admin/municipality","Admin\municipalityController");

Route::get("/admin/sales/{id}/delete","Admin\salesController@destroy");
Route::get("/admin/sales/active/{id}","Admin\salesController@active");
Route::resource("/admin/sales","Admin\salesController");

Route::get("/admin/client/{id}/delete","Admin\ClientController@destroy");
Route::get("/admin/client/active/{id}","Admin\ClientController@active");
Route::resource("/admin/client","Admin\ClientController");

Route::get("/admin/plate/{id}/delete","Admin\PlateController@destroy");
Route::get("/admin/plate/active/{id}","Admin\PlateController@active");
Route::resource("/admin/plate","Admin\PlateController");
Route::get("/municipality/plate/{id}/client","Admin\ClientController@Platebook");



// Route::get("/municipality","Municipality\municipalityController@index");
// Route::get("/municipality/plate/create","Municipality\municipalityController@create");
// Route::resource("/municipality/municipality","Municipality\municipalityController");
// Route::get("/municipality/municipality/{id}/delete","Municipality\municipalityController@destroy");
// Route::get("/municipality/municipality/active/{id}","Municipality\municipalityController@active");

Route::get("/client","Client\HomeController@index");
Route::get("/client/home/profile","Client\HomeController@profile");
Route::post("/client/home/profile","Client\HomeController@updateprofile");
Route::get("/client/home/changepassword","Client\HomeController@changepassword");
Route::post("/client/home/changepassword","Client\HomeController@setchangepassword");




Route::resource("/client/plate","Client\PlateController");
//newww to confirm marker in google map
Route::get("/client/confirm/{id}","Client\PlateController@confirm");
Route::get("/client/confirm/{id}/book","Client\PlateController@book");
Route::post("/client/confirm/{id}/book","Client\PlateController@updatebook");

Route::resource("/client/client","Client\ClientController");
Route::get("/client/client/{id}/delete","Client\ClientController@destroy");
Route::get("/client/client/active/{id}","Client\ClientController@active");




Route::get('/home/register', "HomeController@register");
Route::post('/home/postregister', "HomeController@postregister");

Auth::routes();

Route::get('/redirect', 'HomeController@redirect');
Route::get('/home', 'HomeController@index')->name('home');
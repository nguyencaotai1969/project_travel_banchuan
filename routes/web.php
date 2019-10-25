<?php


Route::get('/master-layout', function () {
    return view('master-layout');
});
Route::get('/','TourController@TrangChu')->name('trangchu');


Route::get('/trang-chu','TourController@TrangChu')->name('trangchu');

Route::get('/chi-tiet-tour/{id}', 'TourController@TourDetail')->name('chitiettour');

Route::post('/tim-kiem', 'TourController@Search')->name('timkiem');

Route::get('/diem-den/{id}','TourController@DiemDen')->name('diemden');

Route::get('/dat-tour/{id}', 'TourController@DatTour')->name('dattour');

Route::post('/luu-don/{id}', 'SaveController@LuuDon')->name('luudon');

Route::get('/du-lich','TourController@DuLich')->name('dulich');

Route::get('/danh-sach/{id}','TourController@ListTour')->name('danhsach');

Route::get('/tintuc','NewsController@ListNews')->name('tintuc');

Route::get('/chitiet/{id}','NewsController@DetailNews')->name('chitiet');

Route::get('/lienhe',function(){
	return view('page.lienhe');})->name('lienhe');

Route::post('/lienhe/save','NewsController@SaveContact')->name('luulienhe');



Route::get('login','Auth\LoginController@login')->name('login');
// logout user
Route::get('/logout_user','Auth\UserController@logout')->name('logout_user');

//
Route::get('/gioithieu',function(){
	return view('page.gioithieu');
})->name('gioithieu');


//admin
Route::get('/login-admin',function(){
	return view('admin.index');
})->name('index');
Route::get('/login-admin/validation',function(){
	return view('admin.validation');
})->name('validation');


//admin control
// Tour
Route::get('/admin/tour/add','AdminTourController@AddTour')
    ->name('admin_tour_add')
    ->middleware('can:AdminTour.AddTour');
Route::post('/admin/tour/save','AdminTourController@SaveTour')->name('admin_tour_save')
 ->middleware('can:AdminTour.SaveTour');

Route::get('/admin/tour/manage','AdminTourController@ListTour')->name('listtour')
 ->middleware('can:AdminTour.ListTour');

Route::get('/admin/get-change/{id}','AdminTourController@GetChange')->name('getchange')
 ->middleware('can:AdminTour.GetChange');
Route::post('/admin/tour/update/{id}', 'AdminTourController@UpdateTour')->name('updatetour')
 ->middleware('can:AdminTour.UpdateTour');

Route::get('/admin/tour/delete/{id}','AdminTourController@DeleteTour')->name('deletetour')
 ->middleware('can:AdminTour.DeleteTour');

// News

Route::get('/admin/news/add','AdminNewsController@AddNews')->name('admin_news_add')
 ->middleware('can:AdminNews.AddNews');
Route::post('/admin/news/save','AdminNewsController@SaveNews')->name('admin_news_save')
 ->middleware('can:AdminNews.SaveNews');

Route::get('/admin/news/manage','AdminNewsController@ListNews')->name('listnews')
    ->middleware('can:AdminNews.ListNews');

Route::get('/admin/news/getchange/{id}','AdminNewsController@GetChange')->name('getchangenews')
 ->middleware('can:AdminNews.GetChange');
Route::post('/admin/news/update/{id}', 'AdminNewsController@UpdateNews')->name('updatenews')
 ->middleware('can:AdminNews.UpdateNew');

Route::get('/admin/news/delete/{id}','AdminNewsController@DeleteNews')->name('deletenews')
 ->middleware('can:AdminNews.DeleteNews');

// Booking


Route::get('/admin/booking/manage','AdminBookingController@ListBooking')->name('listbooking')
 ->middleware('can:AdminBooking.ListBooking');

Route::get('/admin/booking/getchange/{id}','AdminBookingController@GetChangeBooking')->name('getchangebooking')
 ->middleware('can:AdminBooking.GetChangeBooking');

Route::post('/admin/booking/update/{id}', 'AdminBookingController@UpdateBooking')->name('updatebooking')
 ->middleware('can:AdminBooking.UpdateBooking');

Route::get('/admin/booking/delete/{id}','AdminBookingController@DeleteBooking')->name('deletebooking')
 ->middleware('can:AdminBooking.DeleteBooking');


Route::get('/admin/contact/manage','AdminContactController@ListContact')->name('listcontact')
 ->middleware('can:AdminContact.ListContact');
Route::get('/admin/contact/delete/{id}','AdminContactController@DeleteContact')->name('deletecontact')
 ->middleware('can:AdminContact.DeleteContact');

Auth::routes();


Route::get('/admin-import-pms','AdminController@ImportPermission')
    ->name('admin_xxxx')
    ->middleware('can:AdminTour.AddTour');

<?php

use App\Http\Controllers\HomeController;

// use App\Http\Controllers\relation;

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

// Route::get('/', function () {
//     //return view('welcome');
//     return 'Home Page';
// })->name('home.index');
// Route::get('/about', function () {
//     //return view('welcome');
//     return view('about');
// })->name('home.about');


//dynamic
// Route::get('/about/{id?}', function ($id=4) {
//     //return view('welcome');
//     return '<h1>this is id:</h1> '.$id;
// });#->where('id', '[0-9]+');
// Route::get('/recent-posts/{days_ago}', function ($daysago=8) {
//     //return view('welcome');
//     return $daysago." days ago";
// });

// Route::get('/posts/{id?}', function ($id) {
//     $posts=[
//         1=>[
//             'title'=>'intro to laravel',
//             'content'=>'laravel is a framework',
//             'is_new'=>true,
//             'is_comments'=>true
//         ],
//         2=>[
//             'title'=>'intro to php',
//             'content'=>'Php is backend lang',
//             'is_new'=>false
//         ]
//         ];
//         // abort_if(!isset($posts[$id]),404);
//         // return view('posts.show',['postt'=>$posts[$id]]);
//     });
    // $posts=[
    //     1=>[
    //         'title'=>'intro to laravel',
    //         'content'=>'laravel is a framework',
    //         'is_new'=>true,
    //         'is_comments'=>true
    //     ],
    //     2=>[
    //         'title'=>'intro to php',
    //         'content'=>'Php is backend lang',
    //         'is_new'=>false
    //     ],
    //     3=>[
    //         'title'=>'intro to html',
    //         'content'=>'HTML is frontend lang',
    //         'is_new'=>false
    //     ]
    //     ];
// Route::get('/posts',function() use ($posts){
// return view('posts.index',['postt'=>$posts]);
//     });
// Route::get('/posts/{id?}',function($id) use ($posts){
//     abort_if(!isset($posts[$id]),404);
//     return view('posts.show',['postt'=>$posts[$id]]);
// })->name('posts.show');

// Route::prefix('/fun')->name('fun.')->group(function() use ($posts){
//     Route::get('fun/responses',function() use ($posts){
//         return response($posts,201)->header('Content-Type','application/json')->cookie('mycookie','nita',3600);

//     });
//     Route::get('private',function(){
//         return redirect('/posts');

//     });
//     Route::get('back',function() {
//         return back();

//     });
//     Route::get('named',function(){
//         return redirect()->route('posts.show',['id'=>1]);

//     });
//     Route::get('namedd',function(){
//         return redirect()->away('https://www.google.com');

//     });
//     Route::get('json',function() use ($posts){
//         return  response()->json($posts);

//     });
//     Route::get('download',function(){
//         return  response()->download(public_path('demo.png'));

//     });
// });
// Route::get('/posts',function() use ($posts){
//     // dd(request()->all());
//     dd((int)request()->query('page',1));
//     return view('posts.index',['postt'=>$posts]);
// });


//using controllers

 Route::get('/', [HomeController::class,'index']);
// Route::get('/about', [HomeController::class,'about'])->name('home.about');
// Route::get('/single',AboutController::class);
// Route::get('posts', PostControllerr::class);


//resources

Route::resource('posts', PostControllerr::class);
// Route::get('relation', [relation::class,'data']);



// Route::resource('posts', PostControllerr::class)->middleware('auth');

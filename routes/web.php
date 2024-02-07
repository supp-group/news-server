<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () { 
//     return view('welcome');
// })->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('/new/{id}', [CommentController::class, 'show_news'])->name('show_news');

Route::get('/permission', [UserController::class, 'permission']);

// Route::get('/permission', function () {
//     return view('admin.user.permission');
// });


Route::get('addcomment', [CommentController::class, 'create']);
Route::post('savecomment/{id}', [CommentController::class, 'store'])->name('comment.save');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// myprofile
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/myprofile', [ProfileController::class, 'edit'])->name('myprofile.edit');
//     Route::patch('/myprofile', [ProfileController::class, 'update'])->name('myprofile.update');
//     Route::delete('/myprofile', [ProfileController::class, 'destroy'])->name('myprofile.destroy');
// });

// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])-> prefix('cpanel')->group(function () {

    // /cpanel
    Route::get('', [AdminController::class, 'index']);

    // /site
    Route::get('/site', [SiteController::class, 'index']);

        //   /user
        Route:: prefix('user')->group(function () {
            Route::get('show', [UserController::class, 'index']);
            Route::get('add', [UserController::class, 'create']);
            Route::post('save', [UserController::class, 'store'])->name('user.save');

            Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');

        });

        //   /category
        // Route::resource('category', CategoryController::class);

        Route:: prefix('category')->group(function () {
            Route::get('show', [CategoryController::class, 'index']);
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('save', [CategoryController::class, 'store'])->name('category.save');
    
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
    
            Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        });

        //   /news
        // Route::resource('news/show', NewsController::class);
        // Route::resource('news', NewsController::class);
        
        Route:: prefix('news')->group(function () {
            Route::get('show', [NewsController::class, 'index']);
            Route::get('add', [NewsController::class, 'create']);
            Route::post('save', [NewsController::class, 'store'])->name('news.save');

            Route::get('edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
            Route::post('update/{id}', [NewsController::class, 'update'])->name('news.update');

            Route::delete('delete/{id}', [NewsController::class, 'destroy'])->name('news.delete');


            
            Route::get('comment', [CommentController::class, 'index']);

            Route::get('addcomment', [CommentController::class, 'create']);
            Route::post('savecomment/{id}', [CommentController::class, 'store'])->name('comment.save');

            Route::get('editcomment/{id}', [CommentController::class, 'edit'])->name('comment.edit');
            Route::post('updatecomment/{id}', [CommentController::class, 'update'])->name('comment.update');

            Route::delete('deletecomment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

            
            // Route::get('rates', [RateController::class, 'index']);

            // Route::get('like', [NewsController::class, 'newsList']);

            // Route::post('like/{id}', [NewsController::class, 'like'])->name('news.like');
            // Route::delete('like/{id}', [NewsController::class, 'unlike'])->name('news.unlike');

        });
        
        //   /tags
        Route:: prefix('tags')->group(function () {
         Route::get('show', [TagController::class, 'index']);
            Route::get('add', [TagController::class, 'create']);
            Route::post('save', [TagController::class, 'store'])->name('tags.save');

            Route::get('edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
            Route::post('update/{id}', [TagController::class, 'update'])->name('tags.update');

            Route::delete('delete/{id}', [TagController::class, 'destroy'])->name('tags.delete');
        });
   
});

// Composer Routes
Route::middleware(['auth', 'verified', 'composer'])->prefix('cpanelc')->group(function () {

    // /cpanelc
    Route::get('', [AdminController::class, 'index']);

    // /site
    Route::get('/site', [SiteController::class, 'index']);

    // /categoryc
    // Route:: prefix('categoryc')->group(function () {
    //     Route::get('show', [CategoryController::class, 'index']);
    //     Route::get('add', [CategoryController::class, 'create']);
    //     Route::post('save', [CategoryController::class, 'store'])->name('categoryc.save');

    //     Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categoryc.edit');
    //     Route::post('update/{id}', [CategoryController::class, 'update'])->name('categoryc.update');

    //     Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('categoryc.delete');
    // });

    //   /newsc
    Route:: prefix('newsc')->group(function () {
        Route::get('show', [NewsController::class, 'index']);
        Route::get('add', [NewsController::class, 'create']);
        Route::post('save', [NewsController::class, 'store'])->name('newsc.save');

        Route::get('edit/{id}', [NewsController::class, 'edit'])->name('newsc.edit');
        Route::post('update/{id}', [NewsController::class, 'update'])->name('newsc.update');

        Route::delete('delete/{id}', [NewsController::class, 'destroy'])->name('newsc.delete');

        
        Route::get('comment', [CommentController::class, 'index']);

        Route::get('addcomment', [CommentController::class, 'create']);
        Route::post('savecomment/{id}', [CommentController::class, 'store'])->name('comment.save');

    });

    //   /tagsc
//     Route:: prefix('tagsc')->group(function () {
//         Route::get('show', [TagController::class, 'index']);
//         Route::get('add', [TagController::class, 'create']);
//         Route::post('save', [TagController::class, 'store'])->name('tagsc.save');
   
//         Route::get('edit/{id}', [TagController::class, 'edit'])->name('tagsc.edit');
//         Route::post('update/{id}', [TagController::class, 'update'])->name('tagsc.update');
   
//         Route::delete('delete/{id}', [TagController::class, 'destroy'])->name('tagsc.delete');
//    });

});

// Visitor Routes
Route::middleware(['auth', 'verified', 'visitor'])->prefix('site')->group(function () {

    // /site
    Route::get('', [SiteController::class, 'index']);

    Route::get('/new', function () {
        return view('site.news.new');
    });

    Route::get('comment', [CommentController::class, 'index']);

    Route::get('addcomment', [CommentController::class, 'create']);
    Route::post('savecomment/{id}', [CommentController::class, 'store'])->name('comment.save');

    // Route::post('/add_comment', [SiteController::class, 'add_comment']);

});



require __DIR__.'/auth.php';

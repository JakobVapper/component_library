<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\AdminElementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    try {
        $posts = \App\Models\Post::latest('published_at')
            ->whereNotNull('published_at')
            ->paginate(10);
        
        if ($posts->total() == 0) {
            $posts = \App\Models\Post::latest('created_at')->paginate(10);
        }
    } catch (\Exception $e) {
        $posts = new \Illuminate\Pagination\LengthAwarePaginator(
            collect([]), 0, 10
        );
    }
    
    return view('welcome', compact('posts'));
});

Route::get('/dashboard', [BlogController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/blog/{post}', [BlogController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.show');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
    Route::resource('elements', AdminElementController::class);
    Route::patch('/elements/{element}/approve', [AdminElementController::class, 'approve'])->name('elements.approve');
    Route::patch('/elements/{element}/reject', [AdminElementController::class, 'reject'])->name('elements.reject');
    Route::get('/elements/{element}/review', [AdminElementController::class, 'review'])->name('elements.review');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Element routes
Route::middleware(['auth'])->group(function () {
    Route::get('/elements/create', [ElementController::class, 'create'])->name('elements.create');
    Route::post('/elements', [ElementController::class, 'store'])->name('elements.store');
    Route::get('/elements/{element}/edit', [ElementController::class, 'edit'])->name('elements.edit');
    Route::put('/elements/{element}', [ElementController::class, 'update'])->name('elements.update');
    Route::delete('/elements/{element}', [ElementController::class, 'destroy'])->name('elements.destroy');
});

Route::get('/element-preview/{element}', function(App\Models\Element $element) {
    return view('elements.preview', compact('element'));
})->name('elements.preview');

require __DIR__.'/auth.php';
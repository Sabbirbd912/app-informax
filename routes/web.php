<?php

use App\Http\Controllers\Admin\AboutCardController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\ClientItemController;
use App\Http\Controllers\Admin\ClientSectionController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembershipCardController;
use App\Http\Controllers\Admin\MembershipSectionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestimonialSectionController;
use App\Http\Controllers\Admin\NavbarMenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TechnologyItemController;
use App\Http\Controllers\Admin\TechnologySectionController;
use App\Http\Controllers\Websites\AboutPageController;
use App\Http\Controllers\Websites\ContactController;
use App\Http\Controllers\Websites\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-submit', [ContactController::class, 'store'])
    ->middleware('throttle:5,1') // IP based safety
    ->name('contact.submit');
Route::get('/about-page', [AboutPageController::class, 'index'])->name('about.page');

Route::get('/validator-test', function () {
    return validator(['email' => 'test@test.com'], [
        'email' => 'required|email'
    ])->passes();
});


/*
|--------------------------------------------------------------------------
| Admin Panel Routes (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return redirect()->route('login');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        Route::resource('sliders', SliderController::class)->except('show');

        Route::get('about-section', [AboutSectionController::class, 'edit'])->name('about.section.edit');
        Route::post('about-section', [AboutSectionController::class, 'update'])->name('about.section.update');
        Route::resource('about-cards', AboutCardController::class)->parameters(['about-cards' => 'card']);

        Route::get('about-content', [AboutContentController::class, 'edit'])
            ->name('admin.about.content.edit');
        Route::post('about-content', [AboutContentController::class, 'update'])
            ->name('admin.about.content.update');




        Route::get('technology-section', [TechnologySectionController::class, 'edit'])->name('technology.section.edit');
        Route::post('technology-section', [TechnologySectionController::class, 'update'])->name('technology.section.update');
        Route::resource('technology-items', TechnologyItemController::class);

        Route::get('product-section', [ProductSectionController::class, 'edit'])->name('product-section.edit');
        Route::post('product-section', [ProductSectionController::class, 'update'])->name('product-section.update');
        Route::resource('products', ProductController::class);

        Route::get('service-section', [ServiceSectionController::class, 'edit'])->name('service-section.edit');
        Route::post('service-section', [ServiceSectionController::class, 'update'])->name('service-section.update');
        Route::resource('services', ServiceController::class);

        Route::get('client-section', [ClientSectionController::class, 'edit'])->name('client.section.edit');
        Route::post('client-section', [ClientSectionController::class, 'update'])->name('client.section.update');
        Route::resource('client-items', ClientItemController::class);

        Route::get('membership/section', [MembershipSectionController::class, 'edit'])->name('membership-section.edit');
        Route::put('membership/section', [MembershipSectionController::class, 'update'])->name('membership-section.update');
        Route::resource('membership-cards', MembershipCardController::class)->parameters(['membership-cards' => 'card']);

        Route::resource('navbar-menus', NavbarMenuController::class);
        Route::resource('social-links', SocialLinkController::class);

        Route::get('contact/section', [ContactSectionController::class, 'edit'])->name('contact.section.edit');
        Route::put('contact/section', [ContactSectionController::class, 'update'])->name('contact.section.update');

        Route::get('contact/messages', [ContactMessageController::class, 'index'])->name('contact.messages.index');
        Route::get('contact/messages/{message}', [ContactMessageController::class, 'show'])->name('contact.messages.show');
        Route::post('contacts/{message}/reply', [ContactMessageController::class, 'reply'])->name('contacts.reply');
        Route::delete('contact/messages/{message}', [ContactMessageController::class, 'destroy'])->name('contact.messages.destroy');

        Route::get('testimonial-section', [TestimonialSectionController::class, 'edit'])
            ->name('admin.testimonial.section');
        Route::post('testimonial-section', [TestimonialSectionController::class, 'update']);
        Route::resource('testimonials', TestimonialController::class)
            ->names('admin.testimonials');
    });

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

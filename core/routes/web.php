<?php


use App\Models\Permalink;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', function () {
    return view('admin.login');
})->name('login');


/*=======================================================
 Front Routes
=======================================================*/

Route::group(['middleware' => 'setlang'], function () {

    Route::get('/', 'Front\FrontendController@index')->name('front.index');
    
    $permalink = Permalink::first();

    Route::get("$permalink->faq_slug", 'Front\FrontendController@faq')->name('front.faq');
    Route::get("$permalink->about_slug", 'Front\FrontendController@about')->name('front.about');
    Route::get("$permalink->service_slug", 'Front\FrontendController@service')->name('front.service');
    Route::get("$permalink->service_slug".'/{slug}', 'Front\FrontendController@service_details')->name('front.service.details');
    Route::get("$permalink->portfolio_slug", 'Front\FrontendController@portfolio')->name('front.portfolio');
    Route::get("$permalink->portfolio_slug".'/{slug}', 'Front\FrontendController@portfolio_details')->name('front.portfolio.details');
    Route::get("$permalink->package_slug", 'Front\FrontendController@package')->name('front.package');
    Route::get("$permalink->gallery_slug", 'Front\FrontendController@gallery')->name('front.gallery');

    // product route
    Route::get('product/load/ajax/{category_id}', 'Front\ProductController@product_load')->name('front.product.load');
    Route::get('cart/header/load/ajax', 'Front\ProductController@headerCartLoad')->name('header.cart.load');
    Route::get('cart/qty/get/ajax', 'Front\ProductController@cartQtyGet')->name('cart.qty.get');
    Route::get("$permalink->product_slug", 'Front\ProductController@index')->name('front.products');
    Route::get("$permalink->product_slug".'/{slug}', 'Front\ProductController@product_details')->name('front.product.details');
    Route::get("$permalink->cart_slug", 'Front\ProductController@cart')->name('front.cart');
    Route::get('/add-to-cart/{id}', 'Front\ProductController@addToCart')->name('add.cart');
    Route::post('/cart/update', 'Front\ProductController@updatecart')->name('cart.update');
    Route::get('/cart/item/remove/{id}', 'Front\ProductController@cartitemremove')->name('cart.item.remove');
    Route::get("$permalink->checkout_slug", 'Front\ProductController@checkout')->name('front.checkout');
    Route::get("$permalink->checkout_slug".'/{slug}', 'Front\ProductController@Prdouctcheckout')->name('front.product.checkout');


    // Checkou

    Route::post('/checkout-submit', 'Payment\Product\CheckoutController@checkout')->name('front.checkout.submit');

    Route::get('/checkout/success', 'Front\CheckoutController@paymentSuccess')->name('front.checkout.success');
    Route::get('/checkout/cancle', 'Front\CheckoutController@paymentCancle')->name('front.checkout.cancle');
    Route::get('/paypal/checkout/redirect', 'Front\CheckoutController@paymentRedirect')->name('front.checkout.redirect');
    Route::get('/checkout/mollie/notify', 'Front\CheckoutController@mollieRedirect')->name('front.checkout.mollie.redirect');
    Route::post('/paytm/notify', 'Payment\PaytmController@notify')->name('front.paytm.notify');
    Route::post('/paytm/submit', 'Payment\PaytmController@store')->name('product.paytm.submit');
    Route::post('/mercadopago/submit', 'Payment\MercadopagoController@store')->name('front.mercadopago.submit');
    Route::post('/authorize/submit', 'Payment\AuthorizeController@store')->name('front.authorize.submit');

    Route::post('/sslcommerz/notify', 'Payment\SslCommerzController@notify')->name('front.sslcommerz.notify');
    Route::post('/sslcommerz/submit', 'Payment\SslCommerzController@store')->name('front.sslcommerz.submit');
  
    //Paypal Routes

    Route::post('/product/paypal/submit', 'Payment\Product\PaypalController@store')->name('product.paypal.submit');
    Route::get('/product/order/paypal/cancle', 'Payment\Product\PaypalController@paycancle')->name('product.payment.cancle');
    Route::get('/product/paypal/return', 'Payment\Product\PaypalController@payreturn')->name('product.payment.return');
    Route::get('/product/paypal/notify', 'Payment\Product\PaypalController@notify')->name('product.payment.notify');

    //Stripe Routes
    Route::post('/product/stripe/submit', 'Payment\Product\StripeController@store')->name('product.stripe.submit');

    //PayTM Routes
    Route::post('/paytm/submit', 'Payment\Product\PaytmController@store')->name('product.paytm.submit');
    Route::post('/paytm/notify', 'Payment\Product\PaytmController@notify')->name('product.paytm.notify');

    //  Cash On Delevery Routs
    Route::post('/cash_on_delivery/submit', 'Payment\Product\CashOnDeliveryController@store')->name('product.cash_on_delivery.submit');


    // Paystack
    Route::post('/paystack/submit', 'Payment\Product\PaystackController@store')->name('product.paystack.submit');
    Route::post('/paystack/page', 'Payment\Product\PaystackController@page')->name('product.paystack.page');


    Route::get("$permalink->career_slug", 'Front\FrontendController@career')->name('front.career');
    Route::get("$permalink->career_slug".'/{slug}', 'Front\FrontendController@careerdetails')->name('front.careerdetails');
    Route::get('/slider/ovarla', 'Admin\SettingController@slider_overlay')->name('front.slider_overlay');
    Route::post('/slider/ovarla', 'Admin\SettingController@slider_o_update')->name('front.slider.overlay.submit');
    Route::post('/job/apply/submit', 'Front\FrontendController@job_apply')->name('job.apply.submit');

    Route::get("$permalink->quote_slug", 'Front\FrontendController@quote')->name('front.quot');
    Route::post('/quot/submit', 'Front\FrontendController@quote_submit')->name('front.quote_submit');

    Route::get("$permalink->team_slug", 'Front\FrontendController@team')->name('front.team');
    Route::get("$permalink->team_slug".'/{id}', 'Front\FrontendController@team_details')->name('front.team_details');

    Route::get("$permalink->contact_slug", 'Front\FrontendController@contact')->name('front.contact');
    Route::post('/contact/submit', 'Front\FrontendController@contactSubmit')->name('front.contact.submit');
    Route::post('/newsletter/store', 'Admin\NewsletterController@store')->name('front.newsletter');
    Route::get('/cache-clear', 'Admin\CacheController@clear')->name('front.cache.clear');


    // Blog route
    Route::get("$permalink->blog_slug", 'Front\FrontendController@blogs')->name('front.blogs');
    Route::get("$permalink->blog_slug".'/{slug}', 'Front\FrontendController@blogdetails')->name('front.blogdetails');

    Route::get('/changelanguage/{lang}', 'Front\FrontendController@changeLanguage')->name('changeLanguage');
    Route::get('/changecurrency/{currId}', 'Front\FrontendController@changeCurrency')->name('changeCurrency');

    // Product Review Route
    Route::post('review/submit','Front\ProductReviewController@reviewSubmit')->name('front.review.submit');


    // ***************************** USER ROUTE START ***************************************//
    Route::group(['prefix' => 'user'], function () {

        Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
        Route::post('/login/submit', 'User\LoginController@login')->name('user.login.submit');

        Route::get('/register', 'User\RegisterController@showRegisterForm')->name('user.register');
        Route::post('/register/submit', 'User\RegisterController@register')->name('user.register.submit');
        Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user.register.token');

        Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user.forgot');
        Route::post('/forgot', 'User\ForgotController@forgot')->name('user.forgot.submit');

        Route::get('/change-password', 'User\UserController@change_password')->name('user.change_password');
        Route::post('/update-password/{id}', 'User\UserController@update_password')->name('user.update_password');
    });

    Route::group(['prefix' => 'user', 'middleware' => 'auth:web'], function () {


        Route::get('/reset', 'User\UserController@resetform')->name('user.reset');
        Route::post('/reset', 'User\UserController@reset')->name('user.reset.submit');

        Route::get('/logout', 'User\UserController@logout')->name('user.logout');

        Route::get('/profile', 'User\UserController@profile')->name('user.profile');
        Route::post('/profile', 'User\UserController@profileupdate')->name('user.profile.update');

        Route::get('/dashboard', 'User\UserController@index')->name('user.dashboard');
        Route::get('/edit-profile', 'User\UserController@editprofile')->name('user.editprofile');
        Route::post('/update-profile/{id}', 'User\UserController@updateprofile')->name('user.updateprofile');

        // product order route
        Route::get('/product-orders', 'User\UserController@product_order')->name('user.product.order');
        Route::get('/downloadable', 'User\UserController@downloadable')->name('user.product.downloadable');
        Route::get('/order/details/{id}', 'User\UserController@orderDetails')->name('user.order.details');


    });
    // ***************************** USER ROUTE END ***************************************//

});


/*=======================================================
Admin Routes
=======================================================*/

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/', 'Admin\LoginController@login')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@authenticate')->name('admin.auth');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'checkstatus']], function () {

    //Admin Logout Route
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

    // Admin Profile Routs
    Route::get('/profile/edit', 'Admin\ProfileController@editProfile')->name('admin.editProfile');
    Route::post('/profile/update', 'Admin\ProfileController@updateProfile')->name('admin.updateProfile');
    Route::get('/profile/password/edit', 'Admin\ProfileController@editPassword')->name('admin.editPassword');
    Route::post('/profile/password/update', 'Admin\ProfileController@updatePassword')->name('admin.updatePassword');

    Route::get('bulk/deletes','Admin\BulkDeleteController@bulkDelete')->name('back.bulk.delete');


    Route::group(['middleware' => 'checkpermission:Website Customization'], function () {
        // Basic Information Route
        Route::get('/basicinfo', 'Admin\SettingController@basicinfo')->name('admin.basicinfo');
        Route::post('/basicinfo/update/{id}', 'Admin\SettingController@updateBasicinfo')->name('admin.setting.updateBasicinfo');


        // Menu Route
        Route::get('/menu', 'Admin\MenuController@index')->name('admin.menu.index');
        Route::post('/menu/update', 'Admin\MenuController@update')->name('admin.menu.update');

        
        // Permalink Route
        Route::get('/permalinks', 'Admin\PermalinkController@permalinks')->name('admin.permalinks.index');
        Route::post('/permalinks/update', 'Admin\PermalinkController@permalinksUpdate')->name('admin.permalinks.update');

 
        // SEO Information Route
        Route::get('/seoinfo', 'Admin\SettingController@seoinfo')->name('admin.seoinfo');
        Route::post('/seoinfo/update/{id}', 'Admin\SettingController@updateSeoinfo')->name('admin.setting.updateSeoinfo');

        // Socila Links Route
        Route::get('/slinks', 'Admin\SocialController@slinks')->name('admin.slinks');
        Route::post('/slinks/store', 'Admin\SocialController@storeSlinks')->name('admin.storeSlinks');
        Route::post('/slinks/update/{id}/', 'Admin\SocialController@updateSlinks')->name('admin.updateSlinks');
        Route::get('/slinks/edit/{id}/', 'Admin\SocialController@editSlinks')->name('admin.editSlinks');
        Route::post('/slinks/delete/{id}/', 'Admin\SocialController@deleteSlinks')->name('admin.deleteSlinks');

     
        // Page Visibility  Title Route
        Route::get('/page-visibility', 'Admin\SettingController@pagevisibility')->name('admin.pagevisibility');

        Route::post('/page-visibility/update/theme1', 'Admin\SettingController@updatepagevisibilityh1')->name('admin.pagevisibilityh1.update');
        Route::post('/page-visibility/update/theme2', 'Admin\SettingController@updatepagevisibilityh2')->name('admin.pagevisibilityh2.update');
        Route::post('/page-visibility/update/theme3', 'Admin\SettingController@updatepagevisibilityh3')->name('admin.pagevisibilityh3.update');
        Route::post('/page-visibility/update/theme4', 'Admin\SettingController@updatepagevisibilityh4')->name('admin.pagevisibilityh4.update');
        Route::post('/page-visibility/update/theme5', 'Admin\SettingController@updatepagevisibilityh5')->name('admin.pagevisibilityh5.update');
        Route::post('/page-visibility/update/theme6', 'Admin\SettingController@updatepagevisibilityh6')->name('admin.pagevisibilityh6.update');
        Route::post('/page-visibility/update/theme7', 'Admin\SettingController@updatepagevisibilityh7')->name('admin.pagevisibilityh7.update');
        Route::post('/page-visibility/update/theme8', 'Admin\SettingController@updatepagevisibilityh8')->name('admin.pagevisibilityh8.update');
        Route::post('/page-visibility/update/theme9', 'Admin\SettingController@updatepagevisibilityh9')->name('admin.pagevisibilityh9.update');
        
        Route::get('/page-visibility/theme1', 'Admin\SettingController@pvh1')->name('admin.pagevisibility.pvh1');
        Route::get('/page-visibility/theme2', 'Admin\SettingController@pvh2')->name('admin.pagevisibility.pvh2');
        Route::get('/page-visibility/theme3', 'Admin\SettingController@pvh3')->name('admin.pagevisibility.pvh3');
        Route::get('/page-visibility/theme4', 'Admin\SettingController@pvh4')->name('admin.pagevisibility.pvh4');
        Route::get('/page-visibility/theme5', 'Admin\SettingController@pvh5')->name('admin.pagevisibility.pvh5');
        Route::get('/page-visibility/theme6', 'Admin\SettingController@pvh6')->name('admin.pagevisibility.pvh6');
        Route::get('/page-visibility/theme7', 'Admin\SettingController@pvh7')->name('admin.pagevisibility.pvh7');
        Route::get('/page-visibility/theme8', 'Admin\SettingController@pvh8')->name('admin.pagevisibility.pvh8');
        Route::get('/page-visibility/theme9', 'Admin\SettingController@pvh9')->name('admin.pagevisibility.pvh9');

        Route::get('/page-visibility/innerpage', 'Admin\SettingController@innerpage_visibility')->name('admin.pagevisibility.innerpage_visibility');
        Route::get('/page-visibility/others', 'Admin\SettingController@others_visibility')->name('admin.pagevisibility.others_visibility');

        Route::post('/page-visibility/update/innerpage', 'Admin\SettingController@update_innerpage_visibility')->name('admin.innerpage_visibility.update');
        Route::post('/page-visibility/update/others', 'Admin\SettingController@update_others_visibility')->name('admin.update_others_visibility.update');

        

        // Admin Cookie Alert Routes
        Route::get('/announcement', 'Admin\SettingController@announcement')->name('admin.announcement.index');
        Route::post('/announcement/update/{langid}/', 'Admin\SettingController@update_announcement')->name('admin.update_announcement');

        // Admin maintanance mode Routes
        Route::get('/maintanance', 'Admin\SettingController@maintanance')->name('admin.maintanance.index');
        Route::post('/maintanance/update/', 'Admin\SettingController@update_maintanance')->name('admin.update_maintanance');

        // Admin Preloader Routes
        Route::get('/preloader', 'Admin\SettingController@preloader')->name('admin.preloader.index');
        Route::post('/preloader/update/', 'Admin\SettingController@update_preloader')->name('admin.update_preloader');

        // Admin Footer Logo Text Routes
        Route::get('/footer', 'Admin\FooterController@index')->name('admin.footer.index');
        Route::post('/footer/update/{id}', 'Admin\FooterController@update')->name('admin.footer.update');

        // Admin Footer Link Routes
        Route::get('/flink', 'Admin\FlinkController@index')->name('admin.flink.index');
        Route::get('/flink/add', 'Admin\FlinkController@add')->name('admin.flink.add');
        Route::post('/flink/store', 'Admin\FlinkController@store')->name('admin.flink.store');
        Route::post('/flink/delete/{id}/', 'Admin\FlinkController@delete')->name('admin.flink.delete');
        Route::get('/flink/edit/{id}/', 'Admin\FlinkController@edit')->name('admin.flink.edit');
        Route::post('/flink/update/{id}/', 'Admin\FlinkController@update')->name('admin.flink.update');


        // Admin Sitemap Routes
        Route::get('/sitemap', 'Admin\SitemapController@index')->name('admin.sitemap.index');
        Route::get('/sitemap/add', 'Admin\SitemapController@add')->name('admin.sitemap.add');
        Route::post('/sitemap/store', 'Admin\SitemapController@store')->name('admin.sitemap.store');
        Route::post('/sitemap/{id}/delete', 'Admin\SitemapController@delete')->name('admin.sitemap.delete');
        Route::post('/sitemap/download', 'Admin\SitemapController@download')->name('admin.sitemap.download');

    });

    Route::group(['middleware' => 'checkpermission:General Setting'], function () {

        //  Theme Version  Routes
        Route::get('/theme-version', 'Admin\SettingController@theme_version')->name('admin.theme_version');
        Route::post('/theme-version/post', 'Admin\SettingController@update_theme_version')->name('admin.theme_version.update');

        // Scripts Route
        Route::get('/scripts', 'Admin\SettingController@scripts')->name('admin.scripts');
        Route::post('/scripts/update', 'Admin\SettingController@updateScripts')->name('admin.commonsetting.updateScripts');


        // Custom CSS
        Route::get('/custom-css', 'Admin\SettingController@custom_css')->name('admin.custom.css');
        Route::post('/custom-css/update', 'Admin\SettingController@custom_css_update')->name('admin.custom.css.update');

        // ADMIN EMAIL SETTINGS SECTION
        Route::get('/email-templates', 'Admin\EmailController@index')->name('admin.mail.index');
        Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin.mail.edit');
        Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin.mail.update');
        Route::get('/email-config', 'Admin\EmailController@config')->name('admin.mail.config');
        Route::post('/email-config/submit', 'Admin\EmailController@configUpdate')->name('admin.mail.config.update');
        Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin.group.show');
        Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin.group.submit');
        Route::get('/mail-admin', 'Admin\EmailController@mailadmin')->name('admin.mailadmin');
        Route::post('/mail-admin/update', 'Admin\EmailController@mailadmin_update')->name('admin.mailadmin.update');

        // Admin Announcement Routes
        Route::get('/cookie-alert', 'Admin\SettingController@cookiealert')->name('admin.cookie.alert');
        Route::post('/cookie-alert/update/{langid}/', 'Admin\SettingController@updatecookie')->name('admin.cookie.update');

    });

    Route::group(['middleware' => 'checkpermission:Home'], function () {

        // Hero Slider Version
        Route::get('/slider', 'Admin\SliderController@slider')->name('admin.slider');
        Route::get('/slider/add', 'Admin\SliderController@add')->name('admin.slider.add');
        Route::post('/slider/store', 'Admin\SliderController@store')->name('admin.slider.store');
        Route::post('/slider/delete/{id}/', 'Admin\SliderController@delete')->name('admin.slider.delete');
        Route::get('/slider/edit/{id}/', 'Admin\SliderController@edit')->name('admin.slider.edit');
        Route::post('/slider/update/{id}/', 'Admin\SliderController@update')->name('admin.slider.update');

        // Ecommerce Module
        Route::get('/ecommerce/slider', 'Admin\EcommerceController@slider')->name('admin.ecommerce.slider');
        Route::get('/ecommerce/slider/add', 'Admin\EcommerceController@sliderAdd')->name('admin.ecommerce.sliderAdd');
        Route::post('/ecommerce/slider/store', 'Admin\EcommerceController@sliderStore')->name('admin.ecommerce.sliderStore');
        Route::get('/ecommerce/slider/edit/{id}', 'Admin\EcommerceController@sliderEdit')->name('admin.ecommerce.sliderEdit');
        Route::post('/ecommerce/slider/update/{id}', 'Admin\EcommerceController@sliderUpdate')->name('admin.ecommerce.sliderUpdate');
        Route::post('/ecommerce/slider/delete/{id}', 'Admin\EcommerceController@sliderDelete')->name('admin.ecommerce.sliderDelete');

        Route::get('/ecommerce/banner', 'Admin\EcommerceController@banner')->name('admin.ecommerce.banner');
        Route::get('/ecommerce/banner/add', 'Admin\EcommerceController@bannerAdd')->name('admin.ecommerce.bannerAdd');
        Route::post('/ecommerce/banner/store', 'Admin\EcommerceController@bannerStore')->name('admin.ecommerce.bannerStore');
        Route::get('/ecommerce/banner/edit/{id}', 'Admin\EcommerceController@bannerEdit')->name('admin.ecommerce.bannerEdit');
        Route::post('/ecommerce/banner/update/{id}', 'Admin\EcommerceController@bannerUpdate')->name('admin.ecommerce.bannerUpdate');


        

        // Hero Static Version
        Route::get('/hero/static/', 'Admin\HeroController@index')->name('admin.hero.index');
        Route::post('/hero/static/update/{id}/', 'Admin\HeroController@update')->name('admin.hero.update');

        // Hero Video Version
        Route::get('/hero/herovideo/', 'Admin\HeroController@herovideo')->name('admin.herovideo');
        Route::post('/hero/herovideo/update', 'Admin\HeroController@herovideo_update')->name('admin.herovideo.update');

        // Home Who we Section
        Route::get('/who-we-section/', 'Admin\SectionController@w_w_a')->name('admin.w_w_a');
        Route::post('/who-we-section/update/{id}/', 'Admin\SectionController@w_w_a_update')->name('admin.w_w_a_update');

        // Home About Section
        Route::get('/about-section/', 'Admin\SectionController@about_section')->name('admin.about_section');
        Route::post('/about-section/update/{id}/', 'Admin\SectionController@about_section_update')->name('admin.about_section_update');

        // Home Intro video Section
        Route::get('/intro-video/', 'Admin\SectionController@intro_video')->name('admin.intro_video');
        Route::post('/intro-video/update/{id}/', 'Admin\SectionController@intro_video_update')->name('admin.intro_video_update');

        // Home Why Choose Section Section
        Route::get('/why-choose-us/', 'Admin\SectionController@why_chooseus')->name('admin.why_chooseus');
        Route::post('/why-choose-us/update/{id}/', 'Admin\SectionController@why_chooseus_update')->name('admin.why_chooseus_update');

        Route::get('/why-choose/add/', 'Admin\WhyChooseController@add')->name('admin.wcu.add');
        Route::post('/why-choose/store/', 'Admin\WhyChooseController@store')->name('admin.wcu.store');
        Route::get('/why-choose/edit/{id}', 'Admin\WhyChooseController@edit')->name('admin.wcu.edit');
        Route::post('/why-choose/delete/{id}', 'Admin\WhyChooseController@delete')->name('admin.wcu.delete');
        Route::post('/why-choose/update/{id}', 'Admin\WhyChooseController@update')->name('admin.wcu.update');


        // Home Service Section
        Route::get('/service-section/', 'Admin\SectionController@service_section')->name('admin.service_section');
        Route::post('/service-section/update/{id}/', 'Admin\SectionController@service_section_update')->name('admin.service_section_update');

        // Home Project Section
        Route::get('/project-section/', 'Admin\SectionController@project_section')->name('admin.project_section');
        Route::post('/project-section/update/{id}/', 'Admin\SectionController@project_section_update')->name('admin.project_section_update');


        // Home Features Section
        Route::get('/feature', 'Admin\FeatureController@index')->name('admin.feature.index');
        Route::get('/feature/add', 'Admin\FeatureController@add')->name('admin.feature.add');
        Route::post('/feature/store', 'Admin\FeatureController@store')->name('admin.feature.store');
        Route::post('/feature/delete/{id}/', 'Admin\FeatureController@delete')->name('admin.feature.delete');
        Route::get('/feature/edit/{id}/', 'Admin\FeatureController@edit')->name('admin.feature.edit');
        Route::post('/feature/update/{id}/', 'Admin\FeatureController@update')->name('admin.feature.update');


        // Home Team Section
        Route::get('/team', 'Admin\TeamController@team')->name('admin.team');
        Route::get('/team/add', 'Admin\TeamController@add')->name('admin.team.add');
        Route::post('/team/store', 'Admin\TeamController@store')->name('admin.team.store');
        Route::post('/team/delete/{id}/', 'Admin\TeamController@delete')->name('admin.team.delete');
        Route::get('/team/edit/{id}/', 'Admin\TeamController@edit')->name('admin.team.edit');
        Route::post('/team/update/{id}/', 'Admin\TeamController@update')->name('admin.team.update');
        Route::post('/team-section/update/{id}/', 'Admin\SectionController@team_section_update')->name('admin.team_section_update');


        // Home Contact Section
        Route::get('/contact-section/', 'Admin\SectionController@contact_section')->name('admin.contact_section');
        Route::post('/contact-section/update/{id}/', 'Admin\SectionController@contact_section_update')->name('admin.contact_section_update');

        // Home Meet Us Section
        Route::get('/meet-us/', 'Admin\SectionController@meet_section')->name('admin.meet_section');
        Route::post('/meet-us/update/{id}/', 'Admin\SectionController@meet_section_update')->name('admin.meet_section_update');

        // Home Faq Section
        Route::get('/faq', 'Admin\FaqController@faq')->name('admin.faq');
        Route::get('/faq/add', 'Admin\FaqController@add')->name('admin.faq.add');
        Route::post('/faq/store', 'Admin\FaqController@store')->name('admin.faq.store');
        Route::post('/faq/delete/{id}/', 'Admin\FaqController@delete')->name('admin.faq.delete');
        Route::get('/faq/edit/{id}/', 'Admin\FaqController@edit')->name('admin.faq.edit');
        Route::post('/faq/update/{id}/', 'Admin\FaqController@update')->name('admin.faq.update');
        Route::post('/faq-section/update/{id}/', 'Admin\SectionController@faq_section_update')->name('admin.faq_section_update');


        // Home Counter Contact Section
        Route::get('/counter', 'Admin\FunfactController@index')->name('admin.counter.index');
        Route::get('/counter/add', 'Admin\FunfactController@add')->name('admin.counter.add');
        Route::post('/counter/store', 'Admin\FunfactController@store')->name('admin.counter.store');
        Route::post('/counter/delete/{id}/', 'Admin\FunfactController@delete')->name('admin.counter.delete');
        Route::get('/counter/edit/{id}/', 'Admin\FunfactController@edit')->name('admin.counter.edit');
        Route::post('/counter/update/{id}/', 'Admin\FunfactController@update')->name('admin.counter.update');


        // Home Blog Section
        Route::get('/blog-section/', 'Admin\SectionController@blog_section')->name('admin.blog_section');
        Route::post('/blog-section/update/{id}/', 'Admin\SectionController@blog_section_update')->name('admin.blog_section_update');


        // Home Clients Section
        Route::get('/client', 'Admin\ClientController@index')->name('admin.client.index');
        Route::get('/client/add', 'Admin\ClientController@add')->name('admin.client.add');
        Route::post('/client/store', 'Admin\ClientController@store')->name('admin.client.store');
        Route::post('/client/delete/{id}/', 'Admin\ClientController@delete')->name('admin.client.delete');
        Route::get('/client/edit/{id}/', 'Admin\ClientController@edit')->name('admin.client.edit');
        Route::post('/client/update/{id}/', 'Admin\ClientController@update')->name('admin.client.update');

        // Testimonial Route
        Route::get('/testimonial', 'Admin\TestimonialController@testimonial')->name('admin.testimonial');
        Route::get('/testimonial/add', 'Admin\TestimonialController@add')->name('admin.testimonial.add');
        Route::post('/testimonial/store', 'Admin\TestimonialController@store')->name('admin.testimonial.store');
        Route::post('/testimonial/delete/{id}/', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');
        Route::get('/testimonial/edit/{id}/', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
        Route::post('/testimonial/update/{id}/', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
        Route::post('/testimonial/testimonialcontent/{id}/', 'Admin\TestimonialController@testimonialcontent')->name('admin.testimonialcontent.update');
    });

    Route::group(['middleware' => 'checkpermission:Inner Page'], function () {
        //  History Section
        Route::get('/history', 'Admin\HistoryController@index')->name('admin.history.index');
        Route::get('/history/add', 'Admin\HistoryController@add')->name('admin.history.add');
        Route::post('/history/store', 'Admin\HistoryController@store')->name('admin.history.store');
        Route::post('/history/delete/{id}/', 'Admin\HistoryController@delete')->name('admin.history.delete');
        Route::get('/history/edit/{id}/', 'Admin\HistoryController@edit')->name('admin.history.edit');
        Route::post('/history/update/{id}/', 'Admin\HistoryController@update')->name('admin.history.update');
        Route::post('/history/historycontent/{id}/', 'Admin\HistoryController@historycontent')->name('admin.historycontent.update');

        // Package Route
        Route::get('/package', 'Admin\PackagController@package')->name('admin.package');
        Route::get('/package/add', 'Admin\PackagController@add')->name('admin.package.add');
        Route::post('/package/store', 'Admin\PackagController@store')->name('admin.package.store');
        Route::post('/package/delete/{id}/', 'Admin\PackagController@delete')->name('admin.package.delete');
        Route::get('/package/edit/{id}/', 'Admin\PackagController@edit')->name('admin.package.edit');
        Route::post('/package/update/{id}/', 'Admin\PackagController@update')->name('admin.package.update');
        Route::post('/package/plancontent/{id}/', 'Admin\PackagController@plancontent')->name('admin.plancontent.update');

        // Service Route
        Route::get('/service', 'Admin\ServiceController@service')->name('admin.service');
        Route::get('/service/add', 'Admin\ServiceController@add')->name('admin.service.add');
        Route::post('/service/store', 'Admin\ServiceController@store')->name('admin.service.store');
        Route::post('/service/delete/{id}/', 'Admin\ServiceController@delete')->name('admin.service.delete');
        Route::get('/service/edit/{id}/', 'Admin\ServiceController@edit')->name('admin.service.edit');
        Route::post('/service/update/{id}/', 'Admin\ServiceController@update')->name('admin.service.update');

        // Contact Page
        Route::get('/contact-page', 'Admin\ContactController@contact_page')->name('admin.contact_page');
        Route::post('/contact-page/update/{id}/', 'Admin\ContactController@contact_page_update')->name('admin.contact_page_update');

        // Portfolio  Route
        Route::get('/portfolio', 'Admin\PortfolioController@index')->name('admin.portfolio.index');
        Route::get('/portfolio/add', 'Admin\PortfolioController@add')->name('admin.portfolio.add');
        Route::post('/portfolio/store', 'Admin\PortfolioController@store')->name('admin.portfolio.store');
        Route::post('/portfolio/delete/{id}/', 'Admin\PortfolioController@delete')->name('admin.portfolio.delete');
        Route::get('/portfolio/edit/{id}/', 'Admin\PortfolioController@edit')->name('admin.portfolio.edit');
        Route::post('/portfolio/update/{id}/', 'Admin\PortfolioController@update')->name('admin.portfolio.update');
        Route::get('portfolio/get/categoty/{id}', 'Admin\PortfolioController@portfolio_get_category')->name('admin.portfolio.portfolio_get_category');




    });


    Route::group(['middleware' => 'checkpermission:Quote'], function () {
        // Admin Quote Routes
        Route::get('/all/quote', 'Admin\QuoteController@all')->name('admin.all.quote');
        Route::get('/pending/quote', 'Admin\QuoteController@pending')->name('admin.pending.quote');
        Route::get('/processing/quote', 'Admin\QuoteController@processing')->name('admin.processing.quote');
        Route::get('/completed/quote', 'Admin\QuoteController@completed')->name('admin.completed.quote');
        Route::get('/rejected/quote', 'Admin\QuoteController@rejected')->name('admin.rejected.quote');
        Route::post('/quote/status', 'Admin\QuoteController@status')->name('admin.quote.status');
        Route::post('/quote/delete/{id}', 'Admin\QuoteController@delete')->name('admin.quote.delete');
        Route::get('/quote/details/{id}', 'Admin\QuoteController@details')->name('admin.quote.details');
    });


    Route::group(['middleware' => 'checkpermission:Gallery'], function () {

        // Gallery Category Route
        Route::get('/gallery/gallery-category', 'Admin\GcategoryController@gcategory')->name('admin.gcategory');
        Route::get('/gallery/gallery-category/add', 'Admin\GcategoryController@add')->name('admin.gcategory.add');
        Route::post('/gallery/gallery-category/store', 'Admin\GcategoryController@store')->name('admin.gcategory.store');
        Route::post('/gallery/gallery-category/delete/{id}/', 'Admin\GcategoryController@delete')->name('admin.gcategory.delete');
        Route::get('/gallery/gallery-category/edit/{id}/', 'Admin\GcategoryController@edit')->name('admin.gcategory.edit');
        Route::post('/gallery/gallery-category/update/{id}/', 'Admin\GcategoryController@update')->name('admin.gcategory.update');

        // Gallery  Route
        Route::get('/gallery', 'Admin\GalleryController@index')->name('admin.gallery.index');
        Route::get('/gallery/add', 'Admin\GalleryController@add')->name('admin.gallery.add');
        Route::post('/gallery/store', 'Admin\GalleryController@store')->name('admin.gallery.store');
        Route::post('/gallery/delete/{id}/', 'Admin\GalleryController@delete')->name('admin.gallery.delete');
        Route::get('/gallery/edit/{id}/', 'Admin\GalleryController@edit')->name('admin.gallery.edit');
        Route::post('/gallery/update/{id}/', 'Admin\GalleryController@update')->name('admin.gallery.update');
        Route::get('gallery/get/categoty/{id}', 'Admin\GalleryController@gallery_get_category')->name('admin.gallery.gallery_get_category');
    });

    Route::group(['middleware' => 'checkpermission:Job'], function () {
        // Job Category Route
        Route::get('/job/job-category', 'Admin\JcategoryController@jcategory')->name('admin.jcategory');
        Route::get('/job/job-category/add', 'Admin\JcategoryController@add')->name('admin.jcategory.add');
        Route::post('/job/job-category/store', 'Admin\JcategoryController@store')->name('admin.jcategory.store');
        Route::post('/job/job-category/delete/{id}/', 'Admin\JcategoryController@delete')->name('admin.jcategory.delete');
        Route::get('/job/job-category/edit/{id}/', 'Admin\JcategoryController@edit')->name('admin.jcategory.edit');
        Route::post('/job/job-category/update/{id}/', 'Admin\JcategoryController@update')->name('admin.jcategory.update');


        // Job  Route
        Route::get('/job', 'Admin\JobController@jobs')->name('admin.job');
        Route::get('/job/add', 'Admin\JobController@add')->name('admin.job.add');
        Route::post('/job/store', 'Admin\JobController@store')->name('admin.job.store');
        Route::post('/job/delete/{id}/', 'Admin\JobController@delete')->name('admin.job.delete');
        Route::get('/job/edit/{id}/', 'Admin\JobController@edit')->name('admin.job.edit');
        Route::post('/job/update/{id}/', 'Admin\JobController@update')->name('admin.job.update');
        Route::get('job/get/categoty/{id}', 'Admin\JobController@job_get_category')->name('admin.job.job_get_category');


        // job applicant Route
        Route::get('/applicant', 'Admin\ApplicantController@applicants')->name('admin.applicant');
        Route::get('/applicant/interviewing', 'Admin\ApplicantController@interviewing')->name('admin.applicant.interviewing');
        Route::get('/applicant/pending', 'Admin\ApplicantController@pending')->name('admin.applicant.pending');
        Route::get('/applicant/selected', 'Admin\ApplicantController@selected')->name('admin.applicant.selected');
        Route::get('/applicant/rejected', 'Admin\ApplicantController@rejected')->name('admin.applicant.rejected');

        Route::get('/applicant/details/{id}', 'Admin\ApplicantController@applicant_details')->name('admin.applicant.details');
        Route::post('/applicant/delete/{id}', 'Admin\ApplicantController@applicant_delete')->name('admin.applicant.delete');
        Route::get('/applicant/mail/submit', 'Admin\ApplicantController@applicant_mail_submit')->name('applicant.mail.submit');
        Route::post('applicant/status', 'Admin\ApplicantController@status')->name('admin.application.status');
    });


    Route::group(['middleware' => 'checkpermission:Ecommerce'], function () {

        Route::get('/category/get', 'Admin\HelperController@getcategory')->name('admin.helper.category');

        // Product Category Route
        Route::get('/product/product-category', 'Admin\ProductCategoryController@productcategory')->name('admin.product.category');
        Route::get('/product/product-category/add', 'Admin\ProductCategoryController@add')->name('admin.product.category.add');
        Route::post('/product/product-category/store', 'Admin\ProductCategoryController@store')->name('admin.product.category.store');
        Route::post('/product/product-category/delete/{id}/', 'Admin\ProductCategoryController@delete')->name('admin.product.category.delete');
        Route::get('/product/product-category/edit/{id}/', 'Admin\ProductCategoryController@edit')->name('admin.product.category.edit');
        Route::post('/product/product-category/update/{id}/', 'Admin\ProductCategoryController@update')->name('admin.product.category.update');
        
        Route::post('/product/product-category/popular', 'Admin\ProductCategoryController@makePopular')->name('admin.product.category.makePopular');
        Route::post('/product/product-category/featured', 'Admin\ProductCategoryController@makeFeatured')->name('admin.product.category.makeFeatured');

        // Product  Route
        Route::get('/product', 'Admin\ProductController@products')->name('admin.product');
        Route::get('/product/add', 'Admin\ProductController@add')->name('admin.product.add');
        Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::post('/product/delete/{id}/', 'Admin\ProductController@delete')->name('admin.product.delete');
        Route::get('/product/edit/{id}/', 'Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('/product/update/{id}/', 'Admin\ProductController@update')->name('admin.product.update');
        Route::post('/product/gallery/store/', 'Admin\ProductController@galleryStore')->name('admin.product.gallery.store');
        Route::get('/product/gallery/remove/{id}', 'Admin\ProductController@galleryremvoe')->name('admin.product.gallery.remove');

        // Currency  Route
        Route::get('/currency', 'Admin\CurrencyController@currency')->name('admin.currency');
        Route::get('/currency/add', 'Admin\CurrencyController@add')->name('admin.currency.add');
        Route::post('/currency/store', 'Admin\CurrencyController@store')->name('admin.currency.store');
        Route::post('/currency/delete/{id}/', 'Admin\CurrencyController@delete')->name('admin.currency.delete');
        Route::get('/currency/edit/{id}/', 'Admin\CurrencyController@edit')->name('admin.currency.edit');
        Route::post('/currency/update/{id}/', 'Admin\CurrencyController@update')->name('admin.currency.update');
        Route::get('/currency/status/set/{id}', 'Admin\CurrencyController@status')->name('admin.currency.status');

        // Payment Settings Route
        Route::get('/payment/gateways', 'Admin\PaymentGatewayController@index')->name('admin.payment.index');
        Route::get('/payment/gateways/edit/{id}', 'Admin\PaymentGatewayController@edit')->name('admin.payment.edit');
        Route::post('/payment/gateways/update/{id}', 'Admin\PaymentGatewayController@update')->name('admin.payment.update');
        Route::get('/payment/gateways/{delete}', 'Admin\PaymentGatewayController@delete')->name('admin.payment.delete');

        // Shipping Method  Route
        Route::get('/shipping/methods/', 'Admin\ShippingMethodController@shipping')->name('admin.shipping.index');
        Route::get('/shipping/method/add', 'Admin\ShippingMethodController@add')->name('admin.shipping.add');
        Route::post('/shipping/method/store', 'Admin\ShippingMethodController@store')->name('admin.shipping.store');
        Route::post('/shipping/method/delete/{id}/', 'Admin\ShippingMethodController@delete')->name('admin.shipping.delete');
        Route::get('/shipping/method/edit/{id}/', 'Admin\ShippingMethodController@edit')->name('admin.shipping.edit');
        Route::post('/shipping/method/update/{id}/', 'Admin\ShippingMethodController@update')->name('admin.shipping.update');
        Route::get('/shipping/method/status/set/{id}', 'Admin\ShippingMethodController@status')->name('admin.shipping.status');

        //----------- ADMIN PRODUCT ORDER SECTION ----------//

        // Product Order
        Route::get('/product/all/orders', 'Admin\ProductOrderController@all')->name('admin.all.product.orders');
        Route::get('/product/pending/orders', 'Admin\ProductOrderController@pending')->name('admin.pending.product.orders');
        Route::get('/product/processing/orders', 'Admin\ProductOrderController@processing')->name('admin.processing.product.orders');
        Route::get('/product/completed/orders', 'Admin\ProductOrderController@completed')->name('admin.completed.product.orders');
        Route::get('/product/rejected/orders', 'Admin\ProductOrderController@rejected')->name('admin.rejected.product.orders');
        Route::post('/product/orders/status', 'Admin\ProductOrderController@status')->name('admin.product.orders.status');
        Route::post('/product/orders/payment/status', 'Admin\ProductOrderController@payment_status')->name('admin.product.payment.status');
        Route::get('/product/orders/detais/{id}', 'Admin\ProductOrderController@details')->name('admin.product.details');
        Route::post('/product/order/delete', 'Admin\ProductOrderController@orderDelete')->name('admin.product.order.delete');
        Route::post('/product/order/bulk-delete', 'Admin\ProductOrderController@bulkOrderDelete')->name('admin.product.order.bulk.delete');
    });

    Route::group(['middleware' => 'checkpermission:Blog'], function () {
        // Blog Category Route
        Route::get('/blog/blog-category', 'Admin\BcategoryController@bcategory')->name('admin.bcategory');
        Route::get('/blog/blog-category/add', 'Admin\BcategoryController@add')->name('admin.bcategory.add');
        Route::post('/blog/blog-category/store', 'Admin\BcategoryController@store')->name('admin.bcategory.store');
        Route::post('/blog/blog-category/delete/{id}/', 'Admin\BcategoryController@delete')->name('admin.bcategory.delete');
        Route::get('/blog/blog-category/edit/{id}/', 'Admin\BcategoryController@edit')->name('admin.bcategory.edit');
        Route::post('/blog/blog-category/update/{id}/', 'Admin\BcategoryController@update')->name('admin.bcategory.update');


        // Admin Blog Archive Routes
        Route::get('/archives', 'Admin\ArchiveController@index')->name('admin.archive');
        Route::get('/archive/add', 'Admin\ArchiveController@add')->name('admin.archive.add');
        Route::post('/archive/store', 'Admin\ArchiveController@store')->name('admin.archive.store');
        Route::get('/archive/edit/{id}/', 'Admin\ArchiveController@edit')->name('admin.archive.edit');
        Route::post('/archive/update/{id}/', 'Admin\ArchiveController@update')->name('admin.archive.update');
        Route::get('/archive/delete/{id}/', 'Admin\ArchiveController@delete')->name('admin.archive.delete');

        // Blog  Route
        Route::get('/blog', 'Admin\BlogController@blog')->name('admin.blog');
        Route::get('/blog/add', 'Admin\BlogController@add')->name('admin.blog.add');
        Route::post('/blog/store', 'Admin\BlogController@store')->name('admin.blog.store');
        Route::post('/blog/delete/{id}/', 'Admin\BlogController@delete')->name('admin.blog.delete');
        Route::get('/blog/edit/{id}/', 'Admin\BlogController@edit')->name('admin.blog.edit');
        Route::post('/blog/update/{id}/', 'Admin\BlogController@update')->name('admin.blog.update');
        Route::get('blog/get/categoty/{id}', 'Admin\BlogController@blog_get_category')->name('admin.blog.blog_get_category');
    });


    Route::group(['middleware' => 'checkpermission:Role Management'], function () {
        // Admin Roles Routes
        Route::get('/roles', 'Admin\RoleController@index')->name('admin.role.index');
        Route::get('/role/add', 'Admin\RoleController@add')->name('admin.role.add');
        Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
        Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('admin.role.edit');
        Route::post('/role/update/{id}', 'Admin\RoleController@update')->name('admin.role.update');
        Route::post('/role/{id}/delete', 'Admin\RoleController@delete')->name('admin.role.delete');
        Route::get('role/{id}/permissions/manage', 'Admin\RoleController@managePermissions')->name('admin.role.permissions.manage');
        Route::post('role/{id}/permissions/update', 'Admin\RoleController@updatePermissions')->name('admin.role.permissions.update');


        // Admin Users Routes
        Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
        Route::get('/user/add', 'Admin\UserController@add')->name('admin.user.add');
        Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
        Route::get('/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
        Route::post('/user/update/{id}', 'Admin\UserController@update')->name('admin.user.update');
        Route::post('/user/delete/{id}', 'Admin\UserController@delete')->name('admin.user.delete');
    });


    Route::group(['middleware' => 'checkpermission:Subscribers'], function () {
        // Newsletter Route
        Route::get('/subscriber', 'Admin\NewsletterController@newsletter')->name('admin.newsletter');
        Route::get('/mailsubscriber', 'Admin\NewsletterController@mailsubscriber')->name('admin.mailsubscriber');
        Route::post('/subscribers/sendmail', 'Admin\NewsletterController@subscsendmail')->name('admin.subscribers.sendmail');

        Route::get('/subscriber/add', 'Admin\NewsletterController@add')->name('admin.newsletter.add');
        Route::post('/subscriber/store', 'Admin\NewsletterController@store')->name('admin.newsletter.store');
        Route::post('/subscriber/delete/{id}/', 'Admin\NewsletterController@delete')->name('admin.newsletter.delete');
        Route::get('/subscriber/edit/{id}/', 'Admin\NewsletterController@edit')->name('admin.newsletter.edit');
        Route::post('/subscriber/update/{id}/', 'Admin\NewsletterController@update')->name('admin.newsletter.update');
    });


    Route::group(['middleware' => 'checkpermission:Users Management'], function () {
        // Register User Routes
        Route::get('/user', 'Admin\FrontUserController@index')->name('admin.front_user.index');
        Route::get('/user/details/{id}', 'Admin\FrontUserController@details')->name('admin.front_user.details');
        Route::post('/user/status/update', 'Admin\FrontUserController@status_update')->name('admin.front_user.status_update');
        Route::post('/user/delete-front-user/{id}', 'Admin\FrontUserController@delete')->name('admin.front_user.status_delete');
    });

    Route::group(['middleware' => 'checkpermission:Dynamic Page'], function () {
        // Dynamic Page  Route
        Route::get('/dynamic-page', 'Admin\DynamicpageController@dynamic_page')->name('admin.dynamic_page');
        Route::get('/dynamic-page/add', 'Admin\DynamicpageController@add')->name('admin.dynamic_page.add');
        Route::post('/dynamic-page/store', 'Admin\DynamicpageController@store')->name('admin.dynamic_page.store');
        Route::post('/dynamic-page/delete/{id}/', 'Admin\DynamicpageController@delete')->name('admin.dynamic_page.delete');
        Route::get('/dynamic-page/edit/{id}/', 'Admin\DynamicpageController@edit')->name('admin.dynamic_page.edit');
        Route::post('/dynamic-page/update/{id}/', 'Admin\DynamicpageController@update')->name('admin.dynamic_page.update');
    });


    Route::group(['middleware' => 'checkpermission:Language'], function () {

        Route::get('language/edit/{id}', 'Admin\LanguageController@langEdit')->name('admin.language-key');
        Route::put('language/keyword-update/{id}', 'Admin\LanguageController@langUpdate')->name('admin.language.key-update');
        Route::post('language/update/{id}', 'Admin\LanguageController@langUpdatepp')->name('admin.language-manage-update');

        Route::post('language', 'Admin\LanguageController@langStore')->name('admin.language-manage-store');
        Route::delete('language/delete/{id}', 'Admin\LanguageController@langDel')->name('admin.language-manage-del');

        Route::get('language', 'Admin\LanguageController@langManage')->name('admin.language-manage');

        Route::post('store-lang-key/{id}', 'Admin\LanguageController@storeLanguageJson')->name('admin.store-lang-key');
        Route::post('delete-lang-key/{id}', 'Admin\LanguageController@deleteLanguageJson')->name('admin.delete-lang-key');
        Route::post('update-lang-key/{id}', 'Admin\LanguageController@updateLanguageJson')->name('admin.update-lang-key');

        Route::post('settings/language/import', 'Admin\LanguageController@langImport')->name('admin.language.import_lang');
    });


    Route::group(['middleware' => 'checkpermission:Clear Cache'], function () {
        // Admin Cache Clear Routes
        Route::get('/cache-clear', 'Admin\CacheController@clear')->name('admin.cache.clear');
    });
});


Route::group(['middleware' => 'setlang'], function () {

    Route::get('/{slug}', 'Front\FrontendController@front_dynamic_page')->name('front.front_dynamic_page');
});

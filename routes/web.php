<?php

use Illuminate\Support\Facades\App;

Route::get('/', [
    'uses' => 'MarketplaceController@index',
    'as' => '/'
    ]);
Route::get('/ghoreyboshe-family', [
    'uses' => 'MarketplaceController@ghoreybosheFamily',
    'as' => 'ghoreyboshe-family'
]);
Route::get('/fast-sell', [
    'uses' => 'MarketplaceController@fastSell',
    'as' => 'fast-sell'
]);

Route::get('/membership', [
    'uses' => 'MarketplaceController@membership',
    'as' => 'membership'
]);
Route::get('/ques-ans', [
    'uses' => 'MarketplaceController@quesAns',
    'as' => 'ques-ans'
]);
Route::get('/ad-rules', [
    'uses' => 'MarketplaceController@adRules',
    'as' => 'ad-rules'
]);
Route::get('/payment-information', [
    'uses' => 'MarketplaceController@paymentInformation',
    'as' => 'payment-information'
]);
Route::get('/customer-deal', [
    'uses' => 'MarketplaceController@customerDeal',
    'as' => 'customer-deal'
]);
Route::get('/delivery', [
    'uses' => 'MarketplaceController@delivery',
    'as' => 'delivery'
]);
Route::get('/business-demand', [
    'uses' => 'MarketplaceController@businessDemand',
    'as' => 'business-demand'
]);
Route::get('/ghoreyboshe-career', [
    'uses' => 'MarketplaceController@ghoreybosheCareer',
    'as' => 'ghoreyboshe-career'
]);

Route::get('/about-us', [
    'uses' => 'MarketplaceController@aboutUs',
    'as' => 'about-us'
]);
Route::get('/secret-terms', [
    'uses' => 'MarketplaceController@secretTerms',
    'as' => 'secret-terms'
]);
Route::get('/terms', [
    'uses' => 'MarketplaceController@terms',
    'as' => 'terms'
]);
Route::post('/user-complain', [
    'uses' => 'MarketplaceController@userComplain',
    'as' => 'user-complain'
]);
Route::post('/user-sms', [
    'uses' => 'MarketplaceController@userSms',
    'as' => 'user-sms'
]);

Route::group(['middleware' => 'fuser'], function () {
    Route::get('/post-ad-page', [
        'uses' => 'MarketplaceController@postAd',
        'as' => 'post-ad'
    ]);

    Route::get('/property-category-find-page', [
        'uses' => 'MarketplaceController@house_category_find',
        'as' => 'property-category-find'
    ]);
    Route::get('/products-category-find-page', [
        'uses' => 'MarketplaceController@others_category_find',
        'as' => 'products-category-find'
    ]);

    Route::get('/location_for_job_foren_page', [
        'uses' => 'MarketplaceController@location_for_job_foren',
        'as' => 'location_for_job_foren'
    ]);

    Route::get('/post_from_home_ext_page', [
        'uses' => 'MarketplaceController@post_from_home_ext',
        'as' => 'post_from_home_ext'
    ]);

    // Frontend user dashboard
    Route::get('/front-user-dashboard',[
        'uses'  => 'FrontUserDashboardController@index',
        'as'    => 'front-user-dashboard'
    ]);

    // Product Sell
    Route::get('/products-category-page', [
        'uses' => 'ProductSellController@index',
        'as' => 'products-category'
    ]);
    Route::get('/products-location/{categoryId}/{subcategoryId}', [
        'uses' => 'ProductSellController@productLocation',
        'as' => 'products-location'
    ]);
    Route::get('/product-description/{categoryId}/{subcategoryId}/{countryId}/{divisionId}/{districtId}', [
        'uses' => 'ProductSellController@productDescription',
        'as' => 'product-description'
    ]);

    //Property Rent
    Route::get('/property-category-page', [
        'uses' => 'PropertyRentController@index',
        'as' => 'property-category'
    ]);
    Route::get('/property-location/{categoryId}/{subcategoryId}', [
        'uses' => 'PropertyRentController@propertyLocation',
        'as' => 'property-location'
    ]);
    Route::get('/property-description/{categoryId}/{subcategoryId}/{countryId}/{divisionId}/{districtId}', [
        'uses' => 'PropertyRentController@propertyDescription',
        'as' => 'property-description'
    ]);

    //Job Post
    Route::get('/jobs-category-page', [
        'uses' => 'JobPostController@index',
        'as' => 'jobs-category'
    ]);
    Route::get('/job-location/{categoryId}/{subcategoryId}', [
        'uses' => 'JobPostController@jobLocation',
        'as' => 'job-location'
    ]);
    Route::get('/job-description/{categoryId}/{subcategoryId}/{divisionId}/{districtId}', [
        'uses' => 'JobPostController@jobDescription',
        'as' => 'job-description'
    ]);

});

// Save Product
Route::post('/save-product-information', [
    'uses' => 'ProductSellController@saveProductInformation',
    'as' => 'save-product-information'
]);
// Save Property
Route::post('/save-property-information', [
    'uses' => 'PropertyRentController@savePropertyInformation',
    'as' => 'save-property-information'
]);
// Save Job
Route::post('/save-job-information', [
    'uses' => 'JobPostController@saveJobInformation',
    'as' => 'save-job-information'
]);

//All Ad controller
Route::get('/all-ad', [
    'uses' => 'AdController@index',
    'as' => 'all-ad'
]);
Route::get('/single-product-view/{id}', [
    'uses' => 'AdController@singleProductView',
    'as' => 'single-product-view'
]);
Route::get('/single-property-view/{id}', [
    'uses' => 'AdController@singlePropertyView',
    'as' => 'single-property-view'
]);

Route::get('/single-job-view/{id}', [
    'uses' => 'AdController@singleJobView',
    'as' => 'single-job-view'
]);
Route::get('/category-product/{id}', [
    'uses'  => 'AdSearchController@categoryProductSearch',
    'as'    => 'category-product'
]);
Route::get('/subcategory-product/{id}', [
    'uses'  => 'AdSearchController@subCategoryProductSearch',
    'as'    => 'subcategory-product'
]);

Route::get('/divisional-product/{id}', [
    'uses'  => 'AdSearchController@divisionalProductSearch',
    'as'    => 'divisional-product'
]);
Route::get('/district-ad/{id}', [
    'uses'  => 'AdSearchController@districtAdSearch',
    'as'    => 'district-ad'
]);
Route::post('/ad-search', [
    'uses'  => 'AdSearchController@index',
    'as'    => 'ad-search'
]);

Route::get('/category-with-division/{categoryId}/{divisionId}', [
    'uses'  => 'AdSearchController@categoryWithDivisionProduct',
    'as'    => 'category-with-division'
]);
Route::get('/category-with-district/{categoryId}/{districtId}', [
    'uses'  => 'AdSearchController@categoryWithDistrictProduct',
    'as'    => 'category-with-district'
]);
Route::get('/subcategory-with-division/{subcategoryId}/{divisionId}', [
    'uses'  => 'AdSearchController@subcategoryWithDivisionProduct',
    'as'    => 'subcategory-with-division'
]);
Route::get('/subcategory-with-district/{subcategoryId}/{districtId}', [
    'uses'  => 'AdSearchController@subcategoryWithDistrictProduct',
    'as'    => 'subcategory-with-district'
]);
// Basic Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Email verification
Route::get('/verify-email/{email}/{verifyToken}',[
    'uses'  => 'FrontUserRegisterController@verifyEmailAddress',
    'as'    => 'verify-email'
]);

// Frontend user registration and login
Route::post('/front-user-registration',[
    'uses'  => 'FrontUserRegisterController@saveUserInfo',
    'as'    => 'front-user'
]);
Route::post('/front-user-logout', [
    'uses' => 'FrontUserRegisterController@frontUserLogout',
    'as' => 'front-user-logout'
]);
Route::post('/front-user-login', [
    'uses' => 'FrontUserRegisterController@frontUserLogin',
    'as' => 'front-user-login'
]);
Route::get('/signup-options-page', [
    'uses' => 'FrontUserRegisterController@signupOptions',
    'as' => 'signup-options'
]);
Route::get('/signup-page', [
    'uses' => 'FrontUserRegisterController@signUp',
    'as' => 'signup'
]);
Route::get('/login-form', [
    'uses' => 'FrontUserRegisterController@showLoginForm',
    'as' => 'login-form'
]);

//Front User Dashboard
Route::post('/update-front-user', [
    'uses' => 'FrontUserDashboardController@updateUser',
    'as' => 'update-front-user'
]);
Route::post('/update-front-user-password', [
    'uses' => 'FrontUserDashboardController@updateUserPassword',
    'as' => 'update-front-user-password'
]);
Route::get('/view-ad-detail/{id}', [
    'uses' => 'FrontUserDashboardController@viewAd',
    'as' => 'view-ad-detail'
]);
Route::get('/edit-ad-detail/{id}', [
    'uses' => 'FrontUserDashboardController@editAd',
    'as' => 'edit-ad-detail'
]);

Route::get('/delete-ad/{id}', [
    'uses' => 'FrontUserDashboardController@deleteAd',
    'as' => 'delete-ad'
]);

//Ad Sorting
Route::get('/date-asc', [
    'uses'  => 'AdSortingController@index',
    'as'    => 'date-asc'
]);
Route::get('/price-desc', [
    'uses'  => 'AdSortingController@priceDesc',
    'as'    => 'price-desc'
]);
Route::get('/price-asc', [
    'uses'  => 'AdSortingController@priceAsc',
    'as'    => 'price-asc'
]);

//Facebook Login
Route::get('/redirect', 'FrontUserRegisterController@redirect');
Route::get('/callback', 'FrontUserRegisterController@callback');

//Website Logo and Name
Route::get('/logo-name',[
    'uses'  => 'WebsiteLogoAndNameController@index',
    'as'    => 'logo-name'
]);
Route::get('/edit-logo-name',[
    'uses'  => 'WebsiteLogoAndNameController@editLogoAndName',
    'as'    => 'edit-logo-name'
]);
Route::post('/save-site-information',[
    'uses'  => 'WebsiteLogoAndNameController@saveSiteInformation',
    'as'    => 'save-site-information'
]);
Route::post('/update-site-information',[
    'uses'  => 'WebsiteLogoAndNameController@updateLogoAndName',
    'as'    => 'update-site-information'
]);
//Banner Ad
Route::get('/add-banner-ad',[
    'uses'  => 'BannerAdController@index',
    'as'    => 'add-banner-ad'
]);
Route::post('/save-banner-ad',[
    'uses'  => 'BannerAdController@saveBannerAd',
    'as'    => 'save-banner-ad'
]);

Route::get('/manage-banner-ad',[
    'uses'  => 'BannerAdController@manageBannerAd',
    'as'    => 'manage-banner-ad'
]);
Route::get('/edit-banner-ad/{id}',[
    'uses'  => 'BannerAdController@editBannerAd',
    'as'    => 'edit-banner-ad'
]);
Route::post('/update-banner-ad',[
    'uses'  => 'BannerAdController@updateBannerAd',
    'as'    => 'update-banner-ad'
]);

Route::get('/delete-banner-ad/{id}',[
    'uses'  => 'BannerAdController@deleteBannerAd',
    'as'    => 'delete-banner-ad'
]);

//GhoreyBoshe Family
Route::get('/add-family',[
   'uses'  => 'GhoreyBosheFamilyController@index',
   'as'    => 'add-family'
]);
Route::post('/save-family-member',[
   'uses'  => 'GhoreyBosheFamilyController@saveFamilyMember',
   'as'    => 'save-family-member'
]);
Route::get('/manage-family',[
   'uses'  => 'GhoreyBosheFamilyController@manageFamily',
   'as'    => 'manage-family'
]);
Route::get('/edit-family-member/{id}',[
   'uses'  => 'GhoreyBosheFamilyController@editFamilyMember',
   'as'    => 'edit-family-member'
]);
Route::post('/update-family-member',[
   'uses'  => 'GhoreyBosheFamilyController@updateFamilyMember',
   'as'    => 'update-family-member'
]);
Route::get('/delete-family-member/{id}',[
   'uses'  => 'GhoreyBosheFamilyController@deleteFamilyMember',
   'as'    => 'delete-family-member'
]);

// Contact Information
Route::get('/add-contact',[
    'uses'  => 'ContactController@index',
    'as'    => 'add-contact'
]);
Route::get('/edit-contact',[
    'uses'  => 'ContactController@editContact',
    'as'    => 'edit-contact'
]);
Route::post('/save-contact',[
    'uses'  => 'ContactController@saveContact',
    'as'    => 'save-contact'
]);
Route::post('/update-contact',[
    'uses'  => 'ContactController@updateContact',
    'as'    => 'update-contact'
]);
Route::get('/contact-us',[
    'uses'  => 'ContactController@contactUs',
    'as'    => 'contact-us'
]);

//Product Category
Route::get('/add-product-category',[
    'uses'  => 'ProductCategoryController@index',
    'as'    => 'add-product-category'
]);
Route::get('/manage-product-category',[
    'uses'  => 'ProductCategoryController@manageProductCategory',
    'as'    => 'manage-product-category'
]);
Route::post('/category/save-product-category',[
    'uses'  => 'ProductCategoryController@saveProductCategory',
    'as'    => 'new-product-category'
]);
Route::get('/unpublish-product-category/{id}',[
    'uses'  => 'ProductCategoryController@unpublishedCategory',
    'as'    => 'unpublish-product-category'
]);
Route::get('/publish-product-category/{id}',[
    'uses'  => 'ProductCategoryController@publishedCategory',
    'as'    => 'publish-product-category'
]);
Route::get('/edit-product-category/{id}',[
    'uses'  => 'ProductCategoryController@editCategory',
    'as'    => 'edit-product-category'
]);
Route::post('/update-product-category',[
    'uses'  => 'ProductCategoryController@updateCategory',
    'as'    => 'update-product-category'
]);
Route::get('/delete-product-category/{id}',[
    'uses'  => 'ProductCategoryController@deleteCategory',
    'as'    => 'delete-product-category'
]);
// Product Subcategory
Route::get('/add-product-subcategory',[
    'uses'  => 'ProductCategoryController@addProductSubcategory',
    'as'    => 'add-product-subcategory'
]);
Route::get('/manage-product-subcategory',[
    'uses'  => 'ProductCategoryController@manageProductSubcategory',
    'as'    => 'manage-product-subcategory'
]);
Route::post('/save-product-subcategory',[
    'uses'  => 'ProductCategoryController@saveProductSubcategory',
    'as'    => 'new-product-subcategory'
]);
Route::get('/unpublish-product-subcategory/{id}',[
    'uses'  => 'ProductCategoryController@unpublishedSubcategory',
    'as'    => 'unpublish-product-subcategory'
]);
Route::get('/publish-product-subcategory/{id}',[
    'uses'  => 'ProductCategoryController@publishedSubcategory',
    'as'    => 'publish-product-subcategory'
]);
Route::get('/edit-product-subcategory/{id}',[
    'uses'  => 'ProductCategoryController@editSubcategory',
    'as'    => 'edit-product-subcategory'
]);
Route::post('/update-product-subcategory',[
    'uses'  => 'ProductCategoryController@updateSubcategory',
    'as'    => 'update-product-subcategory'
]);
Route::get('/delete-product-subcategory/{id}',[
    'uses'  => 'ProductCategoryController@deleteSubcategory',
    'as'    => 'delete-product-subcategory'
]);
//Country, Division and District
Route::get('/add-country',[
    'uses'  => 'ProductLocationController@index',
    'as'    => 'add-country'
]);
Route::get('/manage-country',[
    'uses'  => 'ProductLocationController@manageCountry',
    'as'    => 'manage-country'
]);
Route::Post('/save-country',[
    'uses'  => 'ProductLocationController@saveCountry',
    'as'    => 'save-country'
]);
Route::get('/unpublish-country/{id}',[
    'uses'  => 'ProductLocationController@unpublishCountry',
    'as'    => 'unpublish-country'
]);
Route::get('/publish-country/{id}',[
    'uses'  => 'ProductLocationController@publishCountry',
    'as'    => 'publish-country'
]);
Route::get('/edit-country/{id}',[
    'uses'  => 'ProductLocationController@editCountry',
    'as'    => 'edit-country'
]);
Route::post('/update-country',[
    'uses'  => 'ProductLocationController@updateCountry',
    'as'    => 'update-country'
]);
Route::get('/delete-country/{id}',[
    'uses'  => 'ProductLocationController@deleteCountry',
    'as'    => 'delete-country'
]);
Route::get('/add-division',[
    'uses'  => 'ProductLocationController@addDivision',
    'as'    => 'add-division'
]);
Route::get('/manage-division',[
    'uses'  => 'ProductLocationController@manageDivision',
    'as'    => 'manage-division'
]);
Route::Post('/save-division',[
    'uses'  => 'ProductLocationController@saveDivision',
    'as'    => 'save-division'
]);
Route::get('/unpublish-division/{id}',[
    'uses'  => 'ProductLocationController@unpublishDivision',
    'as'    => 'unpublish-division'
]);
Route::get('/publish-division/{id}',[
    'uses'  => 'ProductLocationController@publishDivision',
    'as'    => 'publish-division'
]);
Route::get('/edit-division/{id}',[
    'uses'  => 'ProductLocationController@editDivision',
    'as'    => 'edit-division'
]);
Route::post('/update-division',[
    'uses'  => 'ProductLocationController@updateDivision',
    'as'    => 'update-division'
]);
Route::get('/delete-division/{id}',[
    'uses'  => 'ProductLocationController@deleteDivision',
    'as'    => 'delete-division'
]);
Route::get('/add-district',[
    'uses'  => 'ProductLocationController@addDistrict',
    'as'    => 'add-district'
]);
Route::get('/manage-district',[
    'uses'  => 'ProductLocationController@manageDistrict',
    'as'    => 'manage-district'
]);
Route::Post('/save-district',[
    'uses'  => 'ProductLocationController@saveDistrict',
    'as'    => 'save-district'
]);
Route::get('/unpublish-district/{id}',[
    'uses'  => 'ProductLocationController@unpublishDistrict',
    'as'    => 'unpublish-district'
]);
Route::get('/publish-district/{id}',[
    'uses'  => 'ProductLocationController@publishDistrict',
    'as'    => 'publish-district'
]);
Route::get('/edit-district/{id}',[
    'uses'  => 'ProductLocationController@editDistrict',
    'as'    => 'edit-district'
]);
Route::post('/update-district',[
    'uses'  => 'ProductLocationController@updateDistrict',
    'as'    => 'update-district'
]);
Route::get('/delete-district/{id}',[
    'uses'  => 'ProductLocationController@deleteDistrict',
    'as'    => 'delete-district'
]);
// Manage Product ad
Route::get('/manage-product-ad',[
    'uses'  => 'ManageProductController@index',
    'as'    => 'manage-product-ad'
]);
Route::get('/view-product-ad/{id}',[
    'uses'  => 'ManageProductController@viewProductAd',
    'as'    => 'view-product-ad'
]);
Route::get('/unpublish-product-ad/{id}',[
    'uses'  => 'ManageProductController@unpublishProductAd',
    'as'    => 'unpublish-product-ad'
]);
Route::get('/publish-product-ad/{id}',[
    'uses'  => 'ManageProductController@publishProductAd',
    'as'    => 'publish-product-ad'
]);
Route::get('/edit-product-ad/{id}',[
    'uses'  => 'ManageProductController@editProductAd',
    'as'    => 'edit-product-ad'
]);
Route::post('/update-product-ad',[
    'uses'  => 'ManageProductController@updateProductAd',
    'as'    => 'update-product-ad'
]);

Route::get('/normal-product-ad/{id}',[
    'uses'  => 'ManageProductController@normalProductAd',
    'as'    => 'normal-product-ad'
]);
Route::get('/top-product-ad/{id}',[
    'uses'  => 'ManageProductController@topProductAd',
    'as'    => 'top-product-ad'
]);
Route::get('/delete-product-ad/{id}',[
    'uses'  => 'ManageProductController@deleteAd',
    'as'    => 'delete-product-ad'
]);
// Manage Property ad
Route::get('/manage-property-ad',[
    'uses'  => 'ManagePropertyController@index',
    'as'    => 'manage-property-ad'
]);
Route::get('/view-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@viewPropertyAd',
    'as'    => 'view-property-ad'
]);
Route::get('/unpublish-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@unpublishPropertyAd',
    'as'    => 'unpublish-property-ad'
]);
Route::get('/publish-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@publishPropertyAd',
    'as'    => 'publish-property-ad'
]);
Route::get('/normal-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@normalPropertyAd',
    'as'    => 'normal-property-ad'
]);
Route::get('/top-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@topPropertyAd',
    'as'    => 'top-property-ad'
]);
Route::get('/edit-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@editPropertyAd',
    'as'    => 'edit-property-ad'
]);
Route::post('/update-property-ad',[
    'uses'  => 'ManagePropertyController@updatePropertyAd',
    'as'    => 'update-property-ad'
]);
Route::get('/delete-property-ad/{id}',[
    'uses'  => 'ManagePropertyController@deleteAd',
    'as'    => 'delete-property-ad'
]);
// Manage Job ad
Route::get('/manage-job-ad',[
    'uses'  => 'ManageJobController@index',
    'as'    => 'manage-job-ad'
]);
Route::get('/view-job-ad/{id}',[
    'uses'  => 'ManageJobController@viewJobAd',
    'as'    => 'view-job-ad'
]);
Route::get('/unpublish-job-ad/{id}',[
    'uses'  => 'ManageJobController@unpublishJobAd',
    'as'    => 'unpublish-job-ad'
]);
Route::get('/publish-job-ad/{id}',[
    'uses'  => 'ManageJobController@publishJobAd',
    'as'    => 'publish-job-ad'
]);
Route::get('/normal-job-ad/{id}',[
    'uses'  => 'ManageJobController@normalJobAd',
    'as'    => 'normal-job-ad'
]);
Route::get('/top-job-ad/{id}',[
    'uses'  => 'ManageJobController@topJobAd',
    'as'    => 'top-job-ad'
]);
Route::get('/edit-job-ad/{id}',[
    'uses'  => 'ManageJobController@editJobAd',
    'as'    => 'edit-job-ad'
]);
Route::post('/update-job-ad',[
    'uses'  => 'ManageJobController@updateJobAd',
    'as'    => 'update-job-ad'
]);
Route::get('/delete-job-ad/{id}',[
    'uses'  => 'ManageJobController@deleteAd',
    'as'    => 'delete-job-ad'
]);

//Top Ad Package
Route::get('/add-top-ad-package',[
    'uses'  => 'TopAdController@addPackage',
    'as'    => 'add-top-ad-package'
]);
Route::post('/save-package',[
    'uses'  => 'TopAdController@savePackage',
    'as'    => 'save-package'
]);
Route::get('/manage-top-ad-package',[
    'uses'  => 'TopAdController@managePackage',
    'as'    => 'manage-top-ad-package'
]);
Route::get('/edit-package/{id}',[
    'uses'  => 'TopAdController@editPackage',
    'as'    => 'edit-package'
]);
Route::post('/update-package',[
    'uses'  => 'TopAdController@updatePackage',
    'as'    => 'update-package'
]);
Route::get('/delete-package/{id}',[
    'uses'  => 'TopAdController@deletePackage',
    'as'    => 'delete-package'
]);
// Promote Ad
Route::get('/promote-ad/{id}/{infoId}',[
    'uses'  => 'TopAdController@promoteAd',
    'as'    => 'promote-ad'
]);
Route::get('/save-top-ad-information/{orderId}',[
    'uses'  => 'TopAdController@saveTopAdInformation',
    'as'    => 'save-top-ad-information'
]);
//Payment Gateway Integration
Route::post('/payment-process',[
    'uses'  => 'PaymentIntegrationController@index',
    'as'    => 'payment-process'
]);
Route::post('/merchant-callback',[
    'uses'  => 'PaymentIntegrationController@merchantCallback',
    'as'    => 'merchant-callback'
]);




//chat
Route::get('chat','chat\ChatControler@index')->name('chat');
Route::get('chat/{id}','chat\ChatControler@chat_conversetion')->name('chat_conversetion');
Route::get('chat_save/{product_id}','chat\ChatControler@chat_save')->name('chat_save');
Route::get('chat_user_create/{product_id}/','chat\ChatControler@chat_user_create')->name('chat_user_create');


//admin chat route
Route::get('all_chat','AdminChatController@all_chat')->name('all_chat');
Route::get('all_chat_conversation/{id}','AdminChatController@all_chat_conversation')->name('all_chat_conversation');

//footer menu
Route::get('jana_ojana','Footer\FooterController@jana_ojana')->name('jana_ojana');
Route::post('jana_ojana_save','Footer\FooterController@jana_ojana_save')->name('jana_ojana_save');

Route::get('ad_rules','Footer\FooterController@ad_rules')->name('ad_rules');
Route::post('ad_rules_save','Footer\FooterController@ad_rules_save')->name('ad_rules_save');

Route::get('payment_information','Footer\FooterController@payment_information')->name('payment_information');
Route::post('payment_information_save','Footer\FooterController@payment_information_save')->name('payment_information_save');

Route::get('customer_deal','Footer\FooterController@customer_deal')->name('customer_deal');
Route::post('customer_deal_save','Footer\FooterController@customer_deal_save')->name('customer_deal_save');

Route::get('fast_sell','Footer\FooterController@fast_sell')->name('fast_sell');
Route::post('fast_sell_save','Footer\FooterController@fast_sell_save')->name('fast_sell_save');

Route::get('admin_terms','Footer\FooterController@terms')->name('admin_terms');
Route::post('terms_save','Footer\FooterController@terms_save')->name('terms_save');

Route::get('admin_delivery','Footer\FooterController@admin_delivery')->name('admin_delivery');
Route::post('admin_delivery_save','Footer\FooterController@admin_delivery_save')->name('admin_delivery_save');

Route::get('admin_membership','Footer\FooterController@admin_membership')->name('admin_membership');
Route::post('admin_membership_save','Footer\FooterController@admin_membership_save')->name('admin_membership_save');

Route::get('admin_about_us','Footer\FooterController@admin_about_us')->name('admin_about_us');
Route::post('admin_about_us_save','Footer\FooterController@admin_about_us_save')->name('admin_about_us_save');

Route::get('business_demand','Footer\FooterController@business_demand')->name('business_demand');
Route::post('business_demand_save','Footer\FooterController@business_demand_save')->name('business_demand_save');

Route::get('secret_terms','Footer\FooterController@secret_terms')->name('secret_terms');
Route::post('secret_terms_save','Footer\FooterController@secret_terms_save')->name('secret_terms_save');

Route::get('ghoreyboshe_career','Footer\FooterController@ghoreyboshe_career')->name('ghoreyboshe_career');
Route::post('ghoreyboshe_career_save','Footer\FooterController@ghoreyboshe_career_save')->name('ghoreyboshe_career_save');


//password reset
Route::get('password_reset','FrontUserDashboardController@password_reset')->name('password_reset');
Route::post('password_reset_check','FrontUserDashboardController@password_reset_check')->name('password_reset_check');
Route::get('passwordreset_confirm/{id}','FrontUserDashboardController@passwordreset_confirm')->name('passwordreset_confirm');
Route::post('passwordreset_confirm_save','FrontUserDashboardController@passwordreset_confirm_save')->name('passwordreset_confirm_save');

//sms send
Route::get('sms_send','FrontUserDashboardController@sms_send')->name('sms_send');
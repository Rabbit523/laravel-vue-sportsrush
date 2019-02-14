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

Route::get('/', 'PagesHandler@index')->name('home.main');

Route::get('/login', 'PagesHandler@login')->name('login');

Route::get('/login/{method}', 'LoginHandler@redirectToProvider')->name('login.social');

Route::get('/login/{method}/callback', 'LoginHandler@handleProviderCallback')->name('login.social.callback');




Route::get('/about', 'PagesHandler@about')->name('about');

Route::get('/contact', 'PagesHandler@contact')->name('contact');

Route::get('/who-are-we', 'PagesHandler@whoAreWe')->name('who');


Route::group(['middleware' => ['auth']], function () {


    Route::get('/logout', 'LoginHandler@logout')->name('user.logout');


    Route::prefix('account')->group(function () {

        Route::get('/dashboard', 'PagesHandler@dashboard')->name('account.dashboard');


        Route::get('/settings', 'UserHandler@profile')->name('profile.settings');

        Route::post('/update-profile', 'UserHandler@updateProfile')->name('profile.update');


        Route::get('/create-team', 'TeamHandler@createTeamForm')->name('team.create');

        Route::get('/my-teams', 'TeamHandler@myTeams')->name('teams.own');

        Route::get('/manage-team', 'TeamHandler@manageTeam')->name('team.manage');

        Route::get('/team-details', 'TeamHandler@viewTeamDetails')->name('team.details');


        Route::get('/team-invitations', 'TeamHandler@myInvitations')->name('team.invitations');

        Route::get('/send-invitation', 'TeamHandler@sendInvitation')->name('team.invitation.send');

        Route::get('/accept-invitation', 'TeamHandler@acceptInvitation')->name('team.invitation.accept');


        Route::get('/delete-member', 'TeamHandler@deleteMember')->name('team.member.delete');
        


        Route::get('/delete-invitation', 'TeamHandler@deleteInvitation')->name('team.invitation.delete');



        Route::get('/join-teams', 'TeamHandler@getJoinable')->name('team.joinable');

        Route::post('/join-team', 'TeamHandler@joinTeam')->name('team.join');

        Route::get('/joined-teams', 'TeamHandler@joinedTeams')->name('team.joined');

        Route::get('/team-chat', 'TeamHandler@teamChat')->name('team.chat');

        Route::post('/create-team', 'TeamHandler@registerTeam')->name('team.register');


        Route::get('/create-event', 'EventHandler@createEventForm')->name('event.create');

        Route::get('/edit-event', 'EventHandler@editEvent')->name('event.edit');

        Route::post('/update-event', 'EventHandler@updateEvent')->name('event.update');


        Route::get('/delete-event', 'EventHandler@deleteEvent')->name('event.delete');


        Route::get('/join-event', 'EventHandler@joinEvent')->name('event.join');

        Route::get('/joined-events', 'EventHandler@joinedEvents')->name('events.joined');


        Route::get('/accept-event-invitation', 'EventHandler@acceptInvitation')->name('event.invitation.accept');


        Route::post('/create-event', 'EventHandler@registerEvent')->name('event.register');

        Route::get('/my-events', 'EventHandler@myEvents')->name('events.own');

        Route::get('/event-details', 'EventHandler@viewEventDetails')->name('event.details');

        Route::get('/manage-event', 'EventHandler@manageEvent')->name('event.manage');



        Route::get('/event-invitations', 'EventHandler@myInvitations')->name('event.invitations');

        Route::get('/send-event-invitation', 'EventHandler@sendInvitation')->name('event.invitation.send');


        Route::get('/join-events', 'EventHandler@getJoinable')->name('event.joinable');



    });

});


Route::group(['middleware' => ['admin']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', 'AdminHandler@manageUsers')->name('admin.dashboard');


        Route::prefix('users')->group(function () {

            Route::get('/manage', 'AdminHandler@manageUsers')->name('admin.users.manage');

            Route::get('/profile', 'AdminHandler@userProfile')->name('admin.user.profile');

            Route::get('/delete', 'AdminHandler@deleteUser')->name('admin.user.delete');



            Route::get('/create', 'AdminHandler@createUser')->name('admin.users.create');


        });

        Route::prefix('events')->group(function () {

            Route::get('/manage', 'AdminHandler@manageEvents')->name('admin.events.manage');

            Route::get('/create', 'AdminHandler@createEvent')->name('admin.event.create');


        });

        Route::prefix('teams')->group(function () {

            Route::get('/manage', 'AdminHandler@manageTeams')->name('admin.teams.manage');

            Route::get('/create', 'AdminHandler@createTeam')->name('admin.create.team');

        });

        Route::prefix('cms')->group(function () {

            Route::get('/manage', 'AdminHandler@manageCMS')->name('admin.cms.manage');
            Route::get('/slides', 'AdminHandler@manageSlides')->name('admin.slides.manage');

            Route::post('/save-slides', 'AdminHandler@saveSlides')->name('admin.slides.save');

            Route::get('/delete-slides', 'AdminHandler@deleteSlide')->name('admin.slides.delete');





            Route::post('/update', 'AdminHandler@updateCMS')->name('admin.cms.update');

        });




    });


});





Route::post('/register', 'RegisterHandler@register')->name('site.register');

Route::post('/login', 'LoginHandler@login')->name('site.login');






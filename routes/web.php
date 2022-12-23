<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\Timelinecontroller;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GoogleController;
use App\Models\meeting;
use App\Models\todos;
use App\Models\set;
use App\Models\flashcard;
use App\Models\deck;
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

Route::get('/calender', function () {
    return view('calender');
});

Route::get('testSlider', function () {
    return view('testSlider');
});


Route::get('/', function () {
    return view('homepage');
})->middleware("guest");

Route::get('/login', function () {
    return view('login');
})->middleware("guest")->name("login");

Route::get('/register', function () {
    return view('register');
})->middleware("guest");

Route::group( ['middleware' => 'auth' ], function(){
    Route::get("routetest",function(){
        return "hello! there.";
    });
});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::group( ['middleware' => 'auth' ], function(){
	Route::get('/home',[ Maincontroller::class, 'index']);
	
	Route::get('/admin', function () {
	    return view('admin');
	});

	// Route::get('/teacher', function () {
	//     return view('teacher');
	// });

	Route::get('/teacherlist', function () {
	    return view('teacherlist');
	});

	Route::get('/teacherdetails', function () {
	    return view('teacherdetails');
	});

	Route::get('/addteacher', function () {
	    return view('addteacher');
	});

	Route::get('/editteacher', function () {
	    return view('editteacher');
	});

	// Route::get('/teacher', function () {
	//     return view('teacher');
	// });

	Route::get('/holidays', function () {
	    return view('holidays');
	});

	Route::get('/holidayadd', function () {
	    return view('holidayadd');
	});

	Route::get('/holidayedit', function () {
	    return view('holidayedit');
	});

	Route::get('/calendar', function () {
	    return view('calendar');
	});

	Route::get('/components', function () {
	    return view('components');
	});

	Route::get('/blankpage', function () {
	    return view('blankpage');
	});

	Route::get('/profile', function () {
	    return view('profile');
	});



	// Route::get('/meetingsedit', function () {
	//     return view('meetingsedit');
	// });

	Route::get('/meetingsadd', function () {
	    return view('meetingsadd');
	});

	Route::get('/lessonplans', function () {
	    return view('viewlessonplans');
	});

	Route::get('/examlist', function () {
	    return view('examlist');
	});

	Route::get('/addexam', function () {
	    return view('examadd');
	});

	Route::get('/editexam', function () {
	    return view('examedit');
	});

	Route::get('/premium', function () {
	    return view('premiumtier');
	});

	Route::get('/basic', function () {
	    return view('basictier');
	});

	Route::get('/sets',[ SetController::class, 'index']);
	Route::post('/sets/createset',[ SetController::class, 'createset']);
	Route::post('/sets/shareset',[ SetController::class, 'shareset']);
	Route::post('/sets/copyset',[ SetController::class, 'copyset']);
	Route::get('/sets/deleteset',[ SetController::class, 'deleteset']);

	Route::get('/website/{setid}',[ SetController::class, 'website']);

	Route::get('/decks/{setid}',[ DeckController::class, 'index']);
    Route::post('/decks/createdeck',[ DeckController::class, 'createdeck']);
    Route::post('/createFlashDeckSave',[ DeckController::class, 'createFlashDeckSave']);
    Route::get('deleteDeck/{id}',[ DeckController::class, 'deleteDeck']);
    Route::get('/decks/clearalldecks/{setid}',[ DeckController::class, 'clearalldecks']);
    Route::get('/newDeckFlashPage/{id}',[ DeckController::class, 'newDeckFlashPage']);


    Route::get('/getDataTimeLine',[ Timelinecontroller::class, 'getDataTimeLine']);
    Route::get('/newTimelineCreator/{setid}',[ Timelinecontroller::class, 'newTimelineCreator']);
    Route::get('/timeline/{setid}',[ Timelinecontroller::class, 'index']);
    Route::post('/timeline/createtimeline',[ Timelinecontroller::class, 'createtimeline']);
    Route::get('deleteTime/{id}',[ Timelinecontroller::class, 'deleteTime']);
    Route::get('/timeLineDetail/{timeLineId}',[ Timelinecontroller::class, 'timeLineDetail']);
    Route::get('/timelineTest/{timeLineId}',[ Timelinecontroller::class, 'timelineTest']);
    Route::get('/timeLineLearn/{timeLineId}',[ Timelinecontroller::class, 'timeLineLearn']);
    Route::get('/checkTestDesResult',[ Timelinecontroller::class, 'checkTestDesResult']);
    Route::get('/checkTestDateResult',[ Timelinecontroller::class, 'checkTestDateResult']);
    Route::get('/timeline/clearalltimeline/{setid}',[ Timelinecontroller::class, 'clearalltimeline']);
    Route::post('/createTimeLineSave',[ Timelinecontroller::class, 'createTimeLineSave']);
    Route::get('/saveTimeLineResult',[ Timelinecontroller::class, 'saveTimeLineResult']);


	Route::get('/noteorganizer/{setid}',[ Notescontroller::class, 'index']);
    Route::post('/noteorganizer/createnote',[ Notescontroller::class, 'createnote']);
    Route::get('/noteorganizer/{setid}/note/{noteid}',[ Notescontroller::class, 'notedetails']);
    Route::post('/noteorganizer/{setid}/savenote',[ Notescontroller::class, 'savenote']);
    Route::get('/deleteNote',[ Notescontroller::class, 'deleteNote']);


    Route::get('/flashcard/{deckid}',[ FlashcardController::class, 'index']);
    Route::get('/flashLearn/{id}',[ FlashcardController::class, 'flashLearn'])->name('flashLearn');
    Route::post('/flashcard/createflashcard',[ FlashcardController::class, 'createflashcard']);
    Route::get('/saveFlashcardResult',[ FlashcardController::class, 'saveFlashcardResult']);
    

    Route::get('/subjectlist',[ SubjectController::class, 'subjectlist'])->name('subjectlist');
    Route::get('/subjectadd',[ SubjectController::class, 'subjectadd']);
    Route::get('/subjectedit/{id}',[ SubjectController::class, 'subjectedit']);
    Route::post('/subjectedit/{id}',[ SubjectController::class, 'subjectedited']);
    Route::get('/subjectdelete/{id}',[ SubjectController::class, 'subjectdelete']);

    Route::post('/subjects/createsubject',[ SubjectController::class, 'createsubject']);

    Route::get('/teacher',[ ClassesController::class, 'index'])->name('teacher');
    Route::get('/lessonplans/{id}',[ ClassesController::class, 'lessonplans']);
    Route::post('/lessonplans/{id}',[ ClassesController::class, 'lessonplansave']);

    Route::post('/todos/createtodo',[ ClassesController::class, 'createtodo']);
    Route::get('completetodo/{id}',[ ClassesController::class, 'completetodo']);
    Route::get('/todos/clearalltodo/{setid}',[ ClassesController::class, 'clearalltodo']);
    Route::get('/todos/clearalltodo/',[ ClassesController::class, 'clearalltodo']);

    // Route::get('/meetings', function () {
	//     return view('meetings');
	// });

    Route::get('/meetings',[ ClassesController::class, 'meetings'])->name('meetings');
    Route::post('/meetings/createmeetings',[ ClassesController::class, 'createmeetings']);
    Route::get('/meetingsedit/{id}',[ ClassesController::class, 'meetingsedit']);
    Route::post('/meetingsedit/{id}',[ ClassesController::class, 'meetingsedited']);
    Route::get('/deletemeeting/{id}',[ ClassesController::class, 'meetingsdelete']);


    Route::get('completetodo/{id}',[ ClassesController::class, 'completetodo']);
    Route::get('deletetodo/{id}',[ ClassesController::class, 'deletetodo']);

    Route::post('/events/createevent',[ EventController::class, 'createevent']);
    Route::post('/events/getallevents',[ EventController::class, 'getallevents']);

    //stripe routes
    Route::get('stripe', [StripeController::class, 'stripe']);
	Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

	//edit profile routes
	Route::post('/editprofile',[ Maincontroller::class, 'editprofile']);
	Route::post('/changeprofileimage',[ Maincontroller::class, 'changeprofileimage']);
	Route::post('/changepassword',[ Maincontroller::class, 'changepassword']);

	//crone route
	Route::get('cron', [StripeController::class, 'cron']);

	//search routes
	Route::post('/searchset',[ Searchcontroller::class, 'searchset']);
	Route::post('/set/fetch',[ Searchcontroller::class, 'fetch'])->name('set.fetch');
});

Route::post('/login',[ Maincontroller::class, 'check']);
Route::post('/registerUser',[ Maincontroller::class, 'registerUser']);

Route::get('/timelinecreator',[ Maincontroller::class, 'timelinecreator']);

Route::get('/logout',[ Maincontroller::class, 'logout']);
Route::get('/teacher-dashboard',[ SearchController::class, 'teachersdashboard']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

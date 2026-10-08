<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Route::get('/', function () {
//    return view('welcome');
//});
//
////Different return types
//
//
//Route::get('/jobs', function () {
//    return '<h1>Available Jobs<h1>';
//}) -> name('jobs');
//
//Route::get('/test-jobs', function () {
//    $url = route('jobs');
//    return "<a href='$url'>Click here to go to Jobs!</a>";
//});
//
//Route::get('/api/users', function () {
//    return [
//        'id' => "123",
//        'name' => "John Doe",
//        'email' => "johndoe@gmail.com"
//    ];
//});
//
//Route::redirect('/first', '/second');
//
////Path Parameters
//Route::get('/students/{id}', function (string $id) {
//    return 'This is the student with id: '.$id;
//});
//
////Multiple parameters
//Route::get('/students/{Studentid}/courses/{CourseID}', function (string $Studentid, string $CourseID) {
//    return 'This is the student with student id: '.$Studentid.' and course id: '.$CourseID;
//});
////Optional param
//Route::get('/teachers/{teacherId?}', function ($teacherId = null) {
//    return $teacherId ? 'User '.$teacherId : 'No user specified';
//});
//
////Path param types
//
//Route::get('/user/{id}', function ($id) {
//    return 'User '.$id;
//})->where('id', '[0-9]+');
//
//Route::get('/courses/{courseId}', function ($courseId) {
//    return 'Course id is: '.$courseId;
//})->whereAlpha('courseId');
//
//
//Route::get("/buildings/{id}", function($id){
//            return "Building id: ".$id;
//});
//
//
////Testing Requests
//
//Route::get('/test', function (Illuminate\Http\Request $request) {
//    return [
//        'method' => $request->method(),
//        'url' => $request->url(),
//        'path' => $request->path(),
//        'fullUrl' => $request->fullUrl(),
//        'ip' => $request->ip(),
//        'userAgent' => $request->userAgent(),
//        'header' => $request->header(),
//        'query' => $request->query("/randomName"),
//    ];
//});
//
//
//Route::get('/test2', function (Request $request) {
//    return $request -> has('invalidName');
//});
//
////Testing Responses
//
//Route::get('/hello', function () {
//    return response('Hello, World!', status: 200)->header('Content-Type', 'text/html');
//});
//
//Route::get('/test3', function () {
//    return response('Testing Cookies')->cookie('randomName', 'John Doe');
//});
//
//Route::get('/read-cookie', function (Request $request) {
//    $cookieValue = $request->cookie('randomName');
//    return response()->json(['cookie' => $cookieValue]);
//});


// Assignment: Routing, Requests & Responses

// Task 1:

Route::get('/courses', function () {
    return '<h1>Available Courses</h1>';
})->name('courses');

Route::get('/home', function () {
    $url = route('courses');

    return "<a href='{$url}'>Available Courses</a>";
});


// Task 2:

Route::get('/courses/{id}/{title}', function (string $id, string $title) {
    return 'Course ' . $id . ': ' . $title;
})->whereNumber('id')->whereAlpha('title');

Route::get('/courses/category/{category?}', function ($category = null) {
    return $category ? 'Category: ' . $category : 'All categories';
});

Route::get('/courses/{id}', function ($id) {
    return 'Course ' . $id;
})->whereNumber('id');


// Task 3:

Route::get('/courses/search', function (Request $request) {
    return [
        'keyword' => $request->query('keyword'),
        'level' => $request->input('level', 'Beginner'),
        'hasKeyword' => $request->has('keyword'),
    ];
});



// Task 4:

Route::get('/courses/featured', function () {
    return response()
        ->json(['message' => 'Featured courses'], 200)
        ->header('X-Course-Source', 'Laravel')
        ->cookie('last_visited', 'featured');
});


// Task 5

Route::redirect('/catalog', '/courses');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewLessonNotification;
use App\Lesson;
use App\User;

class LessonController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }

    public function newLesson(){

        $lesson = new Lesson;
        $lesson->user_id =auth()->user()->id;
        $lesson->title = 'Laravel Notification';
        $lesson->body = 'Feature for implemention of real-time notificaiton';
        $lesson->save();
        $user = User::where('id', '!=',auth()->user()->id)->get();

        if(\Notification::send($user,new NewLessonNotification(Lesson::latest('id')->first())))
        {
            return back();
        }
    }
}

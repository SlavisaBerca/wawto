<?php

namespace App\Http\Controllers\Platform\Frontend;

use Mail;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Mail\Platform\WawtoContact;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
        public function ticket(Request $request)
        {
            $gs = Generalsetting::findOrFail(1);

            $email = $request->email;

            $name = $request->name;

            $message = $request->msg;

            $title = 'Ticket Nr:'.mt_rand();

            $submit = Mail::to($gs->main_email)->send(new WawtoContact($title, $message));

            return back()->with('success','Mesajul a fost trimis!!!');
        }
        
        public function contact()
        {
            $questions = Question::all();

            return view('platform/frontend/contact',compact('questions'));
        }

        public function sendMessage(Request $request)
        {
            $gs = Generalsetting::findOrFail(1);
			
            $email = $request->email;

            $subject = $request->subject;

            $message = $request->message;

            $title = 'Mesaj dupa Wawto';

            $submit = Mail::to($gs->main_email)->send(new WawtoContact($title, $message));

            return back()->with('success','Mesajul a fost trimis cu succes. Wawto administratie va raspunde in cel mai scurt timp!!!');
        }
}

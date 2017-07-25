<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		return view ('pages.about');
	}

	public function getContact() {
		return view ('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'required|min:3',
			'message' => 'required|min:10'
			]);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('rikondevil@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your email was sent!');

		return redirect('/');
	}
}
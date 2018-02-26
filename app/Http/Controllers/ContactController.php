<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;


class ContactController extends Controller
{
	public function show() {
		
		$systemMessage = session()->get('systemMessage');
		
		return view('front.contact.show', [
			'systemMessage' => $systemMessage
		]);
	}
	
	public function process() {
		
		$request = request();
		
		$formData = $request->validate([
			'contact_name' => 'required|min:2|max:20',
			'contact_email' => 'required|email',
			'contact_question' => 'required|min:5|max:255',
		]);
		
		//sending email logic
		Mail::to('example@example.com')->send(new ContactForm(
			$formData['contact_name'],
			$formData['contact_email'],
			$formData['contact_question']
		));
		
		return redirect()
				->back()
				->with('systemMessage', trans('front.contact_us_success'));
	}
}

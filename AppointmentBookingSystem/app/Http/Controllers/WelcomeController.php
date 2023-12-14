<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Page;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FeedbackRequest;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('frontend.layout');
    }

    public function dynamic(Page $id)
    {

        return view('frontend.welcome', compact('id'));
    }

    public function store(FeedbackRequest $request)
    {
        $validatedData = $request->validated();
        Feedback::create($validatedData);
        $email = $_ENV['MAIL_FROM_ADDRESS'];
        Mail::send('mail.feedback', ['validatedData' => $validatedData], function ($message) use ($email) {
            $message->to($email, 'abs')->subject('Feedback Received');
        });

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}

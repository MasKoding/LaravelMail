<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    //
    public function subscribe(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'email' => 'required|email'
            ]
        );

        if ($validator->fails()) {
            return new JsonResource(['success' => false, 'message' => $validator->errors()], 422);
        }
        $email =  $request->all()['email'];
        $subscriber = Subscriber::create([
            'email' => $email
        ]);


        $messageTo = "Terimakasih sudah menerima email saya";
        if ($subscriber) {
            Mail::to($email)->
            send(new Subscribe($email,$messageTo));
            return new JsonResponse(
                [
                    'success' => true, 
                    'message' => "Thank you for subscribing to our email, please check your inbox"
                ], 
                200
            );
        }
    }
}

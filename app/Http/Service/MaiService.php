<?php


namespace App\Http\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\InformUserProfile;

class MaiService
{
    public function sendUserProfile($user)
    {
        Mail::to($user['email'])->send(new InformUserProfile($user));
    }
}
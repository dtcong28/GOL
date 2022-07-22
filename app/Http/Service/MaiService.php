<?php

namespace App\Http\Service;

use App\Mail\InformUserProfile;
use Illuminate\Support\Facades\Mail;

class MaiService
{
    public function sendUserProfile($user, $filename)
    {
        Mail::to($user['email'])->send(new InformUserProfile($user, $filename));
    }
}

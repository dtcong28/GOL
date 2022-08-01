<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use SoftDeletes;
    use AuthenticableTrait;
    use Notifiable;

    public const TYPES = [
        'admin' => 1,
        'student' => 2,
    ];

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'type',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     *
     * Xác định xem người dùng đã xác minh địa chỉ email của họ chưa
     * bằng việc kiểm tra trường email_verified_at có null hay không
     *
     */
    public function hasVerifiedEmail()
    {
        return ! is_null($this->verified_at);
    }

    /**
     * Đánh dấu email của người dùng đã được xác minh
     * bằng việc cập nhật timestamp ở trường email_verified_at
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'verified_at' => $this->freshTimestamp(),
        ])->save();
    }
}

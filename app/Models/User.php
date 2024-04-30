<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'company',
        'profile_picture',
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function companies(){

        return $this->hasMany(Company::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function fullName(){

        return $this->first_name . " " . $this->last_name;

    }

    public function profileUrl()
    {

        if ($this->profile_picture) {
            return Storage::exists($this->profile_picture) ? Storage::url($this->profile_picture) :  'http://via.placeholder.com/150x150' ;
        }
       else{
        return 'http://via.placeholder.com/150x150';
       }
    }
}


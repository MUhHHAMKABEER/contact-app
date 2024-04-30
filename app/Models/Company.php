<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contact;
use App\Models\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'email','website'];

    public $searchColumns = ['name','address','email','website'];

    public function contacts(){

        return $this->hasMany(Contact::class)->withoutGlobalScope(SearchScope::class);
    }

    protected static function boot(){

        parent::boot();

        static::addGlobalScope(new SearchScope);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function userCompanies(){

        return self::where('user_id',auth()->id())->orderBy('name')->pluck('name','id')->prepend('ALL Companies','');

    }


}

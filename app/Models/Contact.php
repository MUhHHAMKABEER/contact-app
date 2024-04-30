<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\Scopes\FilterScope;
use App\Models\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\FilterSearchScope;
use App\Models\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use FilterSearchScope;

    protected $fillable = ['first_name','last_name','email','phone','address','company_id','user_id'];

    public $filterColumns = ['company_id'];

    public $searchColumns = ['first_name','last_name','email','company.name'];

    public function company(){
        return $this->belongsTo(Company::class)->withoutGlobalScopes();
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst ($query){
      return $query->orderBy('id', 'desc');
    }


    protected static function boot(){

        parent::boot();

        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new ContactSearchScope);
    }
}

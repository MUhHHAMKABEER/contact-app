<?php

namespace App\Models\Scopes;

use PHPUnit\Util\Filter;
use App\Models\Scopes\FilterScope;
use App\Models\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

trait FilterSearchScope
{
    protected static function bootFilterSearchScope()

    {
        static::addGlobalScope(new SearchScope);
        static::addGlobalScope(new FilterScope);
    }
}

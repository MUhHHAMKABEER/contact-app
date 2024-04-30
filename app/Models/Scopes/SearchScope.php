<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SearchScope implements Scope
{
    protected $searchColumns = ['first_name', 'last_name', 'email', 'company_name'];

    public function apply(Builder $builder, Model $model): void
    {
        $search = request()->query('search');
        if ($search) {
            $columns = property_exists($model, 'searchColumns') ? $model->searchColumns : $this->searchColumns;

            $builder->where(function ($query) use ($search, $columns) {
                foreach ($columns as $index => $column) {
                    $this->applySearchToColumn($query, $index, $column, $search);
                }
            });
        }
    }

    protected function applySearchToColumn($query, $index, $column, $search)
    {
        $arr = explode('.', $column);
        $method = $index === 0 ? "where" : "orWhere";

        if (count($arr) == 2) {
            list($relationship, $col) = $arr;
            $method .= "Has";

            $query->$method($relationship, function ($q) use ($search, $col) {
                $q->where($col, 'LIKE', "%{$search}%");
            });
        } else {
            $query->$method($column, 'LIKE', "%{$search}%");
        }
    }
}

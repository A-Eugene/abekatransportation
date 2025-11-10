<?php

namespace App\Utils\Util;

use Illuminate\Support\Facades\Schema;

function querySearch($modelClass, $search)
{
    $model = new $modelClass;
    $columns = Schema::getColumnListing($model->getTable());
    $query = $model->newQuery();

    if (!empty($search)) {
        $query->where(function ($q) use ($columns, $search) {
            foreach ($columns as $col) {
                if ($col === 'image' || $col === 'password' || (str_ends_with($col, 'id') && !str_starts_with($col, 'id'))) continue;
                $q->orWhere($col, 'LIKE', "%{$search}%");
            }
        });
    }

    return $query;
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

function inputType($table, $column) {
    if ($column === 'image') {
        return 'file';
    }

    if ($column === 'password') {
        return 'password';
    }

    $type = Schema::getColumnType($table, $column);

    if (in_array($type, ['integer', 'bigint', 'decimal', 'float', 'double', 'numeric'])) {
        return 'number';
    } else {
        return 'text';
    }
}

class DashboardController extends Controller
{    
    protected $models = [
        'User' => \App\Models\User::class,
        'Informasi Umum' => \App\Models\InformasiUmum::class,
        'Kategori Informasi Umum' => \App\Models\KategoriInformasiUmum::class,
        'Jangkauan' => \App\Models\Jangkauan::class,
        'Layanan' => \App\Models\Layanan::class
    ];

    public function dashboardPage($modelName)
    {
        $class = $this->models[urldecode($modelName)] ?? null;

        if (!$class) {
            abort(404, "Model not found");
        }

        $model = new $class;
        $table = $model->getTable();

        $perPage = request('per_halaman', 10);
        $search  = request('search');

        $columns = [];
        $foreignColumns = [];
        $foreignTableData = [];

        $relationExists = method_exists($class, 'dashboardRelationDisplay');

        if ($relationExists) {
            foreach ($class::dashboardRelationDisplay() as $foreignKey => $rel) {
                $model = $model->with($rel['relation']);

                // Foreign table data (for CREATE and UPDATE form)
                $foreignModelName = $rel['foreign_model'];
                $foreignModel = new $this->models[$foreignModelName];
                $foreignTable = $foreignModel->getTable();
                $foreignTableData[$foreignModelName] = $foreignModel::all();

                // Replace foreign key column with the actual foreign columns as written
                // in foreign_columns
                foreach (Schema::getColumnListing($table) as $col) {
                    if ($col === $foreignKey) {
                        foreach ($rel['foreign_columns'] as $name => $alias) {
                            $columns[$name] = [
                                'alias' => ucwords(str_replace('_', ' ', $alias)),
                                'inputType' => inputType($foreignTable, $name),
                                'foreignTableName' => $foreignModelName
                            ];
                            $foreignColumns[] = $name;
                        }
                    } else {
                        $columns[$col] = [
                            'alias' => ucwords(str_replace('_', ' ', $col)),
                            'inputType' => inputType($table, $col)
                        ];
                    }
                }
            }
        } else {
            foreach (Schema::getColumnListing($table) as $column) {
                $columns[$column] = [
                    'alias' => ucwords(str_replace('_', ' ', $column)),
                    'inputType' => inputType($table, $column)
                ];
            }
        }

        $query = $model->newQuery();

        if (!empty($search)) {
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $col => $alias) {
                    if ($col === 'image' || $col === 'password' || (str_ends_with($col, 'id') && !str_starts_with($col, 'id'))) continue;
                    $q->orWhere($col, 'LIKE', "%{$search}%");
                }
            });
        }

        return view('pages.dashboard.dashboard', [
            'modelName' => $modelName,
            'columns' => $columns,
            'tableData' => $query->paginate($perPage)->withQueryString(),
            'foreignColumns' => $foreignColumns,
            'foreignTableData' => $foreignTableData
        ]);
    }
}

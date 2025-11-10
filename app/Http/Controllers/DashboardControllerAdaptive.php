<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

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

        $columns = Schema::getColumnListing($table);

        $query = $model->newQuery();

        if (!empty($search)) {
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $col) {
                    if ($col === 'image' || $col === 'password' || (str_ends_with($col, 'id') && !str_starts_with($col, 'id'))) continue;
                    $q->orWhere($col, 'LIKE', "%{$search}%");
                }
            });
        }

        return view('pages.dashboard.dashboard', [
            'modelName' => $modelName,
            'data' => $query->paginate($perPage)->withQueryString(),
            'columnNames'=> $columns,
        ]);
    }
}

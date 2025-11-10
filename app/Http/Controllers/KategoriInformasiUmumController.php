<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KategoriInformasiUmum;

use function App\Utils\Util\querySearch;

class KategoriInformasiUmumController extends Controller
{
   // Dashboard
    public function dashboardPage() {
        $perPage = request('per_halaman', 10);
        $search  = request('search');

        $query = querySearch(KategoriInformasiUmum::class, $search);

        return view('pages.dashboard.dashboard-kategori-informasi-umum', [
            'kategoriInformasiUmums' => $query->paginate($perPage)->withQueryString()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori'  => 'required|string|unique:kategori_informasi_umum,kategori'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['createError' => $firstMessage]);
        }

        KategoriInformasiUmum::create([
            'kategori'  => $request->kategori
        ]);

       return back()->with('success', 'KategoriInformasiUmum created successfully.');
    }

    public function update(Request $request)
    {
        $kategoriInformasiUmum = KategoriInformasiUmum::find($request->id);
        if (!$kategoriInformasiUmum) {
            return redirect()->back()->with('updateError', 'KategoriInformasiUmum not found.');
        }

        $validator = Validator::make($request->all(), [
            'kategori'  => 'required|string|unique:kategori_informasi_umum,kategori,' . $request->id . ',id'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['updateError' => $firstMessage]);
        }

        $kategoriInformasiUmum->kategori = $request->kategori;

        $kategoriInformasiUmum->save();

       return back()->with('success', 'KategoriInformasiUmum updated successfully.');
    }

    public function destroy(Request $request)
    {
        $kategoriInformasiUmum = KategoriInformasiUmum::find($request->id);

        if (!$kategoriInformasiUmum) {
            return redirect()->back()->withErrors(['deleteError' => 'KategoriInformasiUmum not found.']);
        }

        if ($kategoriInformasiUmum->informasiUmum()->exists()) {
            return redirect()->back()->withErrors([
                'deleteError' => 'Cannot delete this category because other records still depend on it.'
            ]);
        }

        $kategoriInformasiUmum->delete();

        return redirect()->back()->with('success', 'KategoriInformasiUmum deleted successfully.');
    }
}

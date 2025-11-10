<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\InformasiUmum;
use App\Models\KategoriInformasiUmum;

use function App\Utils\Util\querySearch;


class InformasiUmumController extends Controller
{
    // Dashboard
    public function dashboardPage() {
        $perPage = request('per_halaman', 10);
        $search  = request('search');

        $query = querySearch(InformasiUmum::class, $search);

        return view('pages.dashboard.dashboard-informasi-umum', [
            'informasiUmums' => $query->paginate($perPage)->withQueryString(),
            'kategoriInformasiUmums' => KategoriInformasiUmum::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:kategori_informasi_umum,id',
            'judul' => 'required|string|max:255|unique:informasi_umum,judul',
            'isi' => 'required|string'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['createError' => $firstMessage]);
        }

        InformasiUmum::create([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return back()->with('success', 'Informasi Umum created successfully.');
    }
        
    public function update(Request $request)
    {
        $informasiUmum = InformasiUmum::find($request->id);
        if (!$informasiUmum) {
            return redirect()->back()->with('updateError', 'InformasiUmum not found.');
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|unique:informasi_umum,judul,' . $request->id . ',id',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_informasi_umum,id',
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['updateError' => $firstMessage]);
        }

        $informasiUmum->update([
            'judul'        => $request->judul,
            'isi'          => $request->isi,
            'kategori_id'  => $request->kategori_id,
        ]);

        return back()->with('success', 'InformasiUmum updated successfully.');
    }

    public function destroy(Request $request)
    {
        $informasiUmum = InformasiUmum::find($request->id);

        if (!$informasiUmum) {
            return redirect()->back()->withErrors(['deleteError' => 'InformasiUmum not found.']);
        }

        $informasiUmum->delete();

        return redirect()->back()->with('success', 'InformasiUmum deleted successfully.');
    }
}

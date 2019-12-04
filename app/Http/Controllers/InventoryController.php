<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\File;

use DateTime;


class InventoryController extends Controller
{
    //
    public function index()
    {
        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->join('tb_kategori', 'tb_barang.barang_kategori_id', '=', 'tb_kategori.kategori_id')
            ->groupBy('barang_id')
            ->get();

        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory",
            'barang' => $barang
        ];

        return view('admin/inv_dashboard', $data);
    }

    public function editBarang($id)
    {
        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->join('tb_kategori', 'tb_barang.barang_kategori_id', '=', 'tb_kategori.kategori_id')
            ->where('barang_id', $id)
            ->get();

        $kategori = DB::table('tb_kategori')->get();

        foreach ($barang as $brg) {
            $bar['barangId'] = $brg->barang_id;
            $bar['barang_nama'] = $brg->barang_nama;
            $bar['barang_harga_beli'] = $brg->barang_harga_beli;
            $bar['barang_harga_jual'] = $brg->barang_harga_jual;
            $bar['barang_deskripsi'] = $brg->barang_deskripsi;
            $bar['barang_kategori'] = $brg->kategori_id;
            $bar['berat'] = $brg->berat_barang;
            $bar['barang_gambar'] = $brg->barang_gambar;
        }
        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory - Edit Barang",
            'kategori' => $kategori
        ];


        return view('admin/edit_barang', $data, $bar);
    }

    public function updateBarang(Request $request)
    {
        $now = new DateTime();
        // menyimpan data file yang diupload ke variabel $file
        if ($request->file) {

            $file = $request->file('file');

            $nama_file = time() . "_" . $file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'gambar_barang';
            $file->move($tujuan_upload, $nama_file);

            DB::table('tb_barang')
                ->where('barang_id', $request->barangId)
                ->update([
                    'barang_nama' => $request->namaBrg,
                    'barang_harga_beli' => $request->hargaBeli,
                    'barang_harga_jual' => $request->hargaJual,
                    'barang_deskripsi' => $request->deskripsi,
                    'barang_kategori_id' => $request->ktgBrg,
                    'berat_barang' => $request->berat,
                    'barang_gambar' => $nama_file,
                    'last_update' => $now

                ]);
            $path = public_path() . "/gambar_barang/" . $request->gambarlama;
            unlink($path);
        } else {
            DB::table('tb_barang')
                ->where('barang_id', $request->barangId)
                ->update([
                    'barang_nama' => $request->namaBrg,
                    'barang_harga_beli' => $request->hargaBeli,
                    'barang_harga_jual' => $request->hargaJual,
                    'barang_deskripsi' => $request->deskripsi,
                    'barang_kategori_id' => $request->ktgBrg,
                    'berat_barang' => $request->berat,
                    'barang_gambar' => $request->gambarlama,
                    'last_update' => $now

                ]);
        }

        return redirect('/admin/edit-barang/' . $request->barangId . '')->with('success', 'Edit Barang');
    }

    public function addBarang()
    {
        $kategori = DB::table('tb_kategori')->get();

        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory - Tambah Barang",
            'kategori' => $kategori
        ];

        return view('admin/tambah_barang', $data);
    }

    public function storeBarang(Request $request)
    {
        $now = new DateTime();

        $this->validate($request, [
            'namaBrg' => 'required|string',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_barang';
        $file->move($tujuan_upload, $nama_file);

        DB::table('tb_barang')->insert([
            'barang_id' => uniqid(),
            'barang_nama' => $request->namaBrg,
            'barang_kategori_id' => $request->ktgBrg,
            'barang_harga_beli' => $request->hargaBeli,
            'barang_harga_jual' => $request->hargaJual,
            'barang_deskripsi' => $request->deskripsi,
            'berat_barang' => $request->berat,
            'barang_gambar' => $nama_file,
            'created_at' => $now
        ]);

        return redirect('/admin/halaman-tambah-barang')->with('success', 'Tambah Barang');
    }

    public function addKategori()
    {
        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory - Tambah Barang - Tambah Kategori"
        ];

        return view('admin/tambah_kategori', $data);
    }

    public function storeKategori(Request $request)
    {
        $this->validate($request, [
            'namaKtg' => 'required|string'
        ]);

        DB::table('tb_kategori')->insert([
            'kategori_nama' => $request->namaKtg
        ]);

        return redirect('/admin/halaman-tambah-barang')->with('success', 'Tambah Kategori');
    }

    public function dataStok()
    {
        $data = [
            'title' => "Data Stok Barang",
            'breadcrumb' => "Inventory - Data Stok Barang",
            'barang' => DB::table('tb_barang')->get()
        ];

        return view('admin/inv_stok', $data);
    }

    public function detailStok($id)
    {
        $data = [
            'title' => "Detail Stok Barang",
            'breadcrumb' => "Inventory - Data Stok Barang",
            'nmBarang' => DB::table('tb_barang')->where('barang_id', $id)->get(),
            'stok' => DB::table('tb_stok')->where('stok_barang_id', $id)->get()
        ];

        return view('admin/inv_stok_detail', $data);
    }

    public function tambahStok($id)
    {
        $data = [
            'title' => "Tambah Stok Barang",
            'breadcrumb' => "Inventory - Tambah Stok Barang",
            'nmBarang' => DB::table('tb_barang')->where('barang_id', $id)->get()
        ];

        return view('admin/inv_stok_tambah', $data);
    }

    public function storeStok(Request $insert)
    {
        $idbrg = $insert->idBrg;
        $ukbrg = $insert->ukrBrg;


        $querychk = DB::table('tb_stok')
            ->where('stok_barang_id', $idbrg)
            ->where('stok_ukuran', $ukbrg)
            ->select('*')
            ->get();

        $total_row = $querychk->count();
        if ($total_row > 0) {
            return redirect()->route('detailStok', ['id' => $insert->idBrg]);
        } else {
            DB::table('tb_stok')->insert([
                'stok_barang_id' => $insert->idBrg,
                'stok_ukuran' => $insert->ukrBrg,
                'stok_jumlah_stok' => $insert->jumlahStok
            ]);
        }

        return redirect()->route('detailStok', ['id' => $insert->idBrg]);
    }

    public function deleteStok($id, $detail)
    {
        DB::table('tb_stok')->where('stok_id', $id)->delete();

        return redirect()->route('detailStok', ['id' => $detail]);
    }

    public function editStok(Request $update)
    {
        DB::table('tb_stok')->where('stok_id', $update->idStok)->update([
            'stok_jumlah_stok' => $update->jumlahStok
        ]);

        return redirect()->route('detailStok', ['id' => $update->idBrg]);
    }
}

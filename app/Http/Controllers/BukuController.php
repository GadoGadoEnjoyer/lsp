<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function createBuku(Request $request){
        $validatedData = $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
        ]);
        Buku::create([
            'kode' => $validatedData['kode'],
            'judul' => $validatedData['judul'],
            'pengarang' => $validatedData['pengarang'],
            'penerbit' => $validatedData['penerbit'],
            'tahun' => $validatedData['tahun'],
            'dipinjam' => 0,
        ]);
        return redirect()->route('show-buku');
    }
    public function showBuku(){
        $buku = Buku::all();
        return view('admin-view-buku', ['buku' => $buku]);
    }
    public function showBukuDashboard(){
        $buku = Buku::where('dipinjam',0)->get();
        return view('dashboard-buku', ['buku' => $buku]);
    }
    public function showSpecificBuku($id){
        $buku = Buku::find($id);
        //Bisa pakai view admin atau user
        //Au ah
        return view('dashboard-buku-specific',['buku' => $buku]);
    }
    public function showSpecificBukuAdmin($id){
        $buku = Buku::find($id);
        //Bisa pakai view admin atau user
        //Au ah
        return view('admin-view-buku-specific',['buku' => $buku]);
    }
    public function updateBuku(Request $request, $id){
        $validatedData = $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'dipinjam' => 'required'
        ]);
        $buku = Buku::find($id);
        $buku->update([
            'kode' => $validatedData['kode'],
            'judul' => $validatedData['judul'],
            'pengarang' => $validatedData['pengarang'],
            'penerbit' => $validatedData['penerbit'],
            'tahun' => $validatedData['tahun'],
            'dipinjam' => $validatedData['dipinjam'],
        ]);

        return redirect()->route('admin-specific-book',['id' => $id]);
    }
    public function deleteBuku($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('admin-buku');
    }

    public function showCreateBuku(){
        return view('admin-create-buku');
    }
    public function showUpdateBuku($id){
        $buku = Buku::find($id);
        return view('admin-update-buku',['buku' => $buku]);
    }
    public function showDeleteBuku($id){
        $buku = Buku::find($id);
        return view('admin-delete-buku',['buku' => $buku]);
    }
}

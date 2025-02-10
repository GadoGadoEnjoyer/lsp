<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    //THIS IS THE ADMIN CRUD, USER CRUD WILL BE DIFFERENT CUZ IDKK AAAAAAAAAAA
    //WHY DIDNT I THINK THIS THROUGH 
    //Should have a validation to chekc if the foreign key table is availble... But I dont know how :/
    //Add more validation!!!!!!
    public function createTransaksi(Request $request){
        $validatedData = $request->validate([
            'siswa' => 'required',
            'buku' => 'required',
            'pinjam' => 'required',
            'kembali' => 'nullable',
        ]);
        Transaksi::create([
            'buku' => $validatedData['buku'],
            'siswa' => $validatedData['siswa'],
            'pinjam' => $validatedData['pinjam'],
            'kembali' => $validatedData['kembali'],
        ]);
        return redirect()->route('admin-transaksi');
    }
    public function showTransaksi(){
        $transaksi = Transaksi::all();
        return view('admin-view-transaksi', compact('transaksi'));
    }
    public function showSpecificTransaksi($id){
        $transaksi = Transaksi::find($id);
        $buku = $transaksi->buku;
        $siswa = $transaksi->siswa;
        return view('admin-view-transaksi-specific', compact('transaksi','buku','siswa'));
    }
    public function updateTransaksi(Request $request,$id){
        $validatedData = $request->validate([
            'siswa' => 'required',
            'buku' => 'required',
            'pinjam' => 'required',
            'kembali' => 'nullable',
        ]);
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'buku' => $validatedData['buku'],
            'siswa' => $validatedData['siswa'],
            'pinjam' => $validatedData['pinjam'],
            'kembali' => $validatedData['kembali'],
        ]);
        return redirect()->route('specific-transaksi',['id' => $id]);
    }
    public function deleteTransaksi($id){
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return view('admin-delete-transaksi',compact('transaksi'));
    }

    
    public function showCreateTransaksi(){
        return view('admin-create-transaksi');
    }
    public function showUpdateTransaksi($id){
        $transaksi = Transaksi::find($id);
        $buku = $transaksi->buku;
        $siswa = $transaksi->siswa;
        return view('admin-update-transaksi', compact('transaksi','buku','siswa'));
    }
    public function showDeleteTransaksi($id){
        $transaksi = Transaksi::find($id);
        return view('admin-delete-transaksi', compact('transaksi'));
    }


    //Now for the user

    public function borrowBook(Request $request, $id){
        $validatedData = $request->validate([
            'pinjam' => 'required',
        ]);
        $buku = Buku::find($id)->get();
        Transaksi::create([
            'buku' => $id,
            'siswa' => Auth::id(),
            'pinjam' => $validatedData['pinjam'],
        ]);
        $buku->dipinjam = 1;
        return redirect()->route('dashboard-buku');
    }
    public function returnBook($id){
        $transaksi = Transaksi::find($id);
        $user = $transaksi->user;
        if($user->id == Auth::id()){
            $transaksi = Transaksi::find($id);
            $transaksi->update([
                'kembali' => Carbon::now()
            ]);
            $buku = Buku::find($transaksi->buku);
            $buku->dipinjam = 0;
        }
        else{
            return redirect()->route('login');
        }
    }

    //Which are unreturned btw
    public function showBorrowedBook(){
        $transaksi = Transaksi::where('kembali', null)->where('siswa',Auth::id());
        return view('dashboard-kembali-buku', compact('transaksi'));
    }
    public function showSpecificBorrowedBook($id){
        $transaksi = Transaksi::find($id);
        return view('dashboard-kembali-buku-specific', compact('transaksi'));
    }
    public function showBorrowBook($id){
        $buku = Buku::find($id);
        return view('dashboard-pinjam-buku', compact('buku'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'nis' => $validatedData['nis'],
            'nama' => $validatedData['nama'],
            'kelas' => $validatedData['kelas'],
            'jurusan' => $validatedData['jurusan'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);
        return redirect()->route('login');
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($validatedData)){
            if(Auth::user()->admin == true){
                return redirect()->route('admin-dashboard');
            }
            else{
                return redirect()->route('dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }
    public function showLogin(){
        return view('login');
    }
    public function showLoginAdmin(){
        return view('admin-login');
    }
    public function showRegister(){
        return view('register');
    }


    //Same as the register but whatever its solely for admin CRUD stuff
    public function createSiswa(Request $request){
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'nis' => $validatedData['nis'],
            'nama' => $validatedData['nama'],
            'kelas' => $validatedData['kelas'],
            'jurusan' => $validatedData['jurusan'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);
        return redirect()->route('admin-siswa');
    }
    public function showSiswa(){
        $siswa = User::all();
        return view('admin-view-user',compact($siswa));
    }
    public function showSpecificSiswa($id){
        $siswa = User::find($id)->get();
        return view('admin-view-user-specific',compact($siswa));
    }
    //Yes, the admin can see the users password
    //This is not a good idea in irl app ngl
    public function updateSiswa(Request $request, $id){
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'username' => 'required',
            'password' => 'required', 
        ]);
        $siswa = User::where('id',$id);
        $siswa->update([
            'nis' => $validatedData['nis'],
            'nama' => $validatedData['nama'],
            'kelas' => $validatedData['kelas'],
            'jurusan' => $validatedData['jurusan'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);
        return redirect()->route('siswa-specific',['id' => $id]);
    }
    public function deleteSiswa($id){
        $siswa = User::find($id);
        $siswa->delete();
        return redirect()->route('admin-siswa');
    }
    
    public function showCreateSiswa(){
        return view("admin-create-user");
    }
    public function showUpdateSiswa($id){
        $siswa = User::find($id)->get();
        return view("admin-update-user",compact($siswa));
    }
    public function showDeleteSiswa($id){
        $siswa = User::find($id)->get();
        return view("admin-delete-user",compact($siswa));
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard(){
        return view("dashboard");
    }
    public function adminDashboard(){
        return view("admin-dashboard");
    }
}

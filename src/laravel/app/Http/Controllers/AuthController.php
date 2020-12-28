<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

class AuthController extends Controller
{
    public function all()
    {
        $people = People::all();
        
        return response()->json($people);
    }

    public function login()
    {
        $people = People::all();
        
        return response()->json($people);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function store(Request $request)
    {
        // ini untuk validasi datanyo
        $validatedData = $request->validate([
          'nama' => 'required',
          'email' => 'required',
          'password' => 'required'
        ]);
 
        // ini untuk meng input data ke db
        $project = People::create([
          'nama' => $validatedData['nama'],
          'email' => $validatedData['content'],
          'password' => $validatedData['password']
        ]);
 
        $msg = [
            'success' => true,
            'message' => 'Akun berhasil di buat!'
        ];
 
        return response()->json($msg);
    }

    public function getUser($id) // for edit and show
    {
        $people = \App\People::find($id);
 
        return response()->json($people);
    }

    public function update(Request $request, $id)
    {
        // validasi data
        $validatedData = $request->validate([
          'nama' => 'required',
          'password' => 'required'
        ]);
 
        // find data dengan id tertentu
        $people = \App\People::find($id);
        $people->nama = $validatedData['nama'];
        $people->password = $validatedData['password'];

        // simpan data nya di db
        $people->save();
 
        $msg = [
            'success' => true,
            'message' => 'Data telah berhasil di perbarui'
        ];
 
        return response()->json($msg);
    }
}

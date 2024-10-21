<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ResidentController extends Controller
{
    public function destroy($id){
        $resident = Resident::find($id);

        if ($resident) {
            $resident->delete();
            History::create([
                'activity' => 'Menghapus Data KTP',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('home')->with('success', 'Data telah terhapus.');
        } else {
            return redirect('home')->with('error', 'Data tidak ditemukan.');
        }
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits:16',
            'name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'religion' => 'required',
            'profession' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],[
            'nik.required' => 'Nik harus diisi.',
            'nik.numeric' => 'Nik harus berupa angka.',
            'nik.digits' => 'Nik harus berisi 16 digit.',
            'name.required' => 'Nama harus diisi.',
            'gender.required' => 'Jenis Kelamin harus diisi.',
            'birthdate.required' => 'Tanggal lahir harus diisi.',
            'birthdate.required' => 'Tanggal lahir harus berisi tanggal.',
            'address.required' => 'Alamat harus diisi.',
            'religion.required' => 'Agama harus diisi.',
            'profeession.required' => 'Pekerjaan harus diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar tidak valid. Hanya mendukung format jpeg, png, jpg, dan gif.',
            'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
            ->withErrors($validator);
        }

        $data = [
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'religion' => $request->religion,
            'profession' => $request->profession,
        ];
        if ($request->hasFile('photo')) {
            $data['image_path'] = $request->file('photo')->store('public/resident_pictures');
        }else{
            $data['image_path'] = 'resident_pictures/profile.jpg';
        }
        
        $resident = Resident::create($data);
        History::create([
            'activity' => 'Menambah Data KTP',
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/home')
        ->with(['success' => 'Data berhasil ditambah.']);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits:16',
            'name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'religion' => 'required',
            'profession' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],[
            'nik.required' => 'Nik harus diisi.',
            'nik.numeric' => 'Nik harus berupa angka.',
            'nik.digits' => 'Nik harus berisi 16 digit.',
            'name.required' => 'Nama harus diisi.',
            'gender.required' => 'Jenis Kelamin harus diisi.',
            'birthdate.required' => 'Tanggal lahir harus diisi.',
            'birthdate.required' => 'Tanggal lahir harus berisi tanggal.',
            'address.required' => 'Alamat harus diisi.',
            'religion.required' => 'Agama harus diisi.',
            'profeession.required' => 'Pekerjaan harus diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar tidak valid. Hanya mendukung format jpeg, png, jpg, dan gif.',
            'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);
 
        if ($validator->fails()) {
            return redirect('/home')
            ->withErrors($validator);
        }

        $resident = Resident::find($id);
        if (!$resident) {
            return redirect('/home')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'religion' => $request->religion,
            'profession' => $request->profession,
        ];
        if ($request->hasFile('photo')) {
            $previousImagePath = $resident->image_path;

            if ($previousImagePath && $previousImagePath != 'public/resident_pictures/profile.jpg') {
                Storage::delete($previousImagePath);
            }
            $data['image_path'] = $request->file('photo')->store('public/resident_pictures');
        }

        $resident->update($data);
        History::create([
            'activity' => 'Mengupdate Data KTP',
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/home')
        ->with(['success' => 'Data berhasil diubah.']);
    }
}

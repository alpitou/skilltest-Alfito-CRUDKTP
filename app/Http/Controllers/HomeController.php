<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Http\Resources\ResidentResource;


class HomeController extends Controller
{
    public function getData()
    {
        $data = Resident::latest()->paginate(10);
        return ResidentResource::collection($data);
    }

    public function search(Request $request)
    {
        $query = $request->input('keyword');

        $data = Resident::latest()->where('name', 'like', '%' . $query . '%')
            ->orWhere('nik', 'like', '%' . $query . '%')
            ->latest()->paginate(10)->withQueryString();

        return ResidentResource::collection($data);
    }

    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $data = $this->search($request);
        } else {
            $data = $this->getData();
        }

        return view('home', compact('data'), [
            'active' => 'home',
        ]);
    }
    public function addForm(){
        return view('add',[
            'active' => 'tambah'
        ]);
    }
}

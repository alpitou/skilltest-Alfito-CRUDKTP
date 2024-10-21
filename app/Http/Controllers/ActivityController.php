<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class ActivityController extends Controller
{
    public function index(){
        $data = History::latest()->paginate(10);
        return view('activity',
        compact('data'),
        [
            'active' => 'activity',
        ]);
    }
}

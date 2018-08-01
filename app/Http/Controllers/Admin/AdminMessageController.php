<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Yajra\DataTables\DataTables;

class AdminMessageController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function browse(){
    	$categories = Message::orderByDesc('created_at')->get();
    	return DataTables::of($categories)->rawColumns(['text'])->make(true);
    }
    public function destroy($id = null){
    	if($id != null){
            $category = Message::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('message', 'Собщение успешно удалено');
        }
    }
}

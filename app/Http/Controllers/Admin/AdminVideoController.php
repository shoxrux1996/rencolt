<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use Intervention\Image\Facades\Image;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class AdminVideoController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){

    	return view('videos.index')->withCategories(Category::orderBy('id')->get());
    }
    public function store(Request $request){

    	$validator = Validator::make($request->all(),[
    		'name_ru'=>'required',
            'categories.*.id'=>'integer|exists:categories'
    	]);

    	if($validator->fails()){
             return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    	$category = new Video($request->all());
    	$category->save();
        $category->categories()->sync($request->categories, false);
    	return redirect()->back()->with('message','Видео успешно создана');
    }
    public function update(Request $request, $id = null){
    	$validator = Validator::make($request->all(),[
            'name_ru'=>'required',
            'categories.*.id'=>'integer|exists:categories'
        ]);
        if($validator->fails() || $id == null){
             return redirect()->back()
                        ->withErrors($validator, 'edit')->with('id', $id)
                        ->withInput();
        }

        $category = Video::findOrFail($id);
        $category->update($request->all());
        $category->categories()->sync($request->categories);

        return redirect()->back()->with('message','Видео успешно изменена');
    }


    public function browse(){
    	$categories = Video::orderByDesc('created_at')->with('categories:id,name_ru,name_uz,name_en')->get();
    	return DataTables::of($categories)->rawColumns(['text_ru','text_uz', 'text_en'])->make(true);
    }



    public function destroy($id = null){
        if($id != null){
            $category = Video::findOrFail($id);
            $category->delete();

            return redirect()->back()->with('message', 'Видео успешно удалена');
        }
        return redirect()->back();
    }
}

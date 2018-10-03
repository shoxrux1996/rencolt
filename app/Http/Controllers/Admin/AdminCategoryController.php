<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use Intervention\Image\Facades\Image;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



class AdminCategoryController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('categories.index');
    }
    public function store(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name_ru'=>'required',
            'slug' => 'unique:categories,slug'
    	]);
    	if($validator->fails()){
             return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    	$category = new Category($request->all());

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $path = 'categories'.'/'.date('FY').'/';
            $filename = Str::random(20);
            $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();
         	while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
            	$filename = Str::random(20);
			}
            $image = Image::make($file)->resize(
                800,
                800
            )->encode($file->getClientOriginalExtension(), 100);

            if ($this->is_animated_gif($file)) {
                Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');
                $fullPathStatic = $path.$filename.'-static.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put($fullPathStatic, (string) $image, 'public');
            } else {
                Storage::disk('public')->put($fullPath, (string) $image, 'public');
            }
            // /*Thumbnail image*/
            //  	// $scale = intval($thumbnails->scale) / 100;
            //     $image = Image::make($file)->resize(
            //         400,
            //         300,
            //         function (Constraint $constraint) {
            //             $constraint->aspectRatio();
            //             $constraint->upsize();
            //         }
            //     )->encode($file->getClientOriginalExtension(), 75);
            // // } elseif (isset($options->thumbnails) && isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
            // //     $crop_width = $thumbnails->crop->width;
            // //     $crop_height = $thumbnails->crop->height;
            // //     $image = Image::make($file)
            // //         ->fit($crop_width, $crop_height)
            // //         ->encode($file->getClientOriginalExtension(), 75);
            // // }
            // Storage::disk('public')->put(
            //     $path.$filename.'-'.'small'.'.'.$file->getClientOriginalExtension(),
            //     (string) $image,
            //     'public'
            // );


        	$category->image = $fullPath;
        }
        $filesPath = [];
        if ($files = $request->file('images')) {

            foreach ($files as $key => $file) {
                $path = 'categories'.'/'.date('FY').'/';
                $filename = Str::random(20);

                while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                    $filename = Str::random(20);
                }
                $image = Image::make($file)->resize(
                    800,
                    800
                )->encode($file->getClientOriginalExtension(), 100);


                $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                if ($this->is_animated_gif($file)) {
                    Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');
                    $fullPathStatic = $path.$filename.'-static.'.$file->getClientOriginalExtension();
                    Storage::disk('public')->put($fullPathStatic, (string) $image, 'public');
                } else {
                    Storage::disk('public')->put($fullPath, (string) $image, 'public');
                }

                array_push($filesPath, $fullPath);
                /*Thumbnail image*/
                // $scale = intval($thumbnails->scale) / 100;
                $image = Image::make($file)->resize(
                    400,
                    400
                )->encode($file->getClientOriginalExtension(), 75);
                // } elseif (isset($options->thumbnails) && isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
                //     $crop_width = $thumbnails->crop->width;
                //     $crop_height = $thumbnails->crop->height;
                //     $image = Image::make($file)
                //         ->fit($crop_width, $crop_height)
                //         ->encode($file->getClientOriginalExtension(), 75);
                // }
                Storage::disk('public')->put(
                    $path.$filename.'-'.'small'.'.'.$file->getClientOriginalExtension(),
                    (string) $image,
                    'public'
                );
            }
            $category->images = json_encode($filesPath);
        }
    	$category->save();
    	return redirect()->back()->with('message','Категория успешно создана');
    }
    public function update(Request $request, $id = null){
    	$validator = Validator::make($request->all(),[
            'name_ru'=>'required',
            'slug' =>  Rule::unique('categories')->ignore($id, 'id')
        ]);
        if($validator->fails() || $id == null){
             return redirect()->back()
                        ->withErrors($validator, 'edit')->with('id', $id)
                        ->withInput();
        }

        $category = Category::findOrFail($id);
        $category->name_ru = $request->name_ru;
        $category->name_uz = $request->name_uz;
        $category->name_en = $request->name_en;


        $category->text_ru = $request->text_ru;
        $category->text_uz = $request->text_uz;
        $category->text_en = $request->text_en;

        if ($request->hasFile('image')) {


            $file = $request->file('image');

            $path = 'categories'.'/'.date('FY').'/';
            $filename = Str::random(20);
            $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();
            while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                $filename = Str::random(20);
            }
            $image = Image::make($file)->resize(
                800,
                600
            )->encode($file->getClientOriginalExtension(), 100);

            if ($this->is_animated_gif($file)) {
                Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');
//                $fullPathStatic = $path.$filename.'-static.'.$file->getClientOriginalExtension();
//                Storage::disk('public')->put($fullPathStatic, (string) $image, 'public');
            } else {
                Storage::disk('public')->put($fullPath, (string) $image, 'public');
            }
            // /*Thumbnail image*/
            //     // $scale = intval($thumbnails->scale) / 100;
            //     $image = Image::make($file)->resize(
            //         300,
            //         200,
            //         function (Constraint $constraint) {
            //             $constraint->aspectRatio();
            //             $constraint->upsize();
            //         }
            //     )->encode($file->getClientOriginalExtension(), 75);
            // // } elseif (isset($options->thumbnails) && isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
            // //     $crop_width = $thumbnails->crop->width;
            // //     $crop_height = $thumbnails->crop->height;
            // //     $image = Image::make($file)
            // //         ->fit($crop_width, $crop_height)
            // //         ->encode($file->getClientOriginalExtension(), 75);
            // // }
            // Storage::disk('public')->put(
            //     $path.$filename.'-'.'small'.'.'.$file->getClientOriginalExtension(),
            //     (string) $image,
            //     'public'
            // );

            $this->deleteFileIfExists($category->image);
            $category->image = $fullPath;
        }
        $filesPath = [];
        if ($files = $request->file('images')) {

            foreach ($files as $key => $file) {
                $path = 'categories'.'/'.date('FY').'/';
                $filename = Str::random(20);

                while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                    $filename = Str::random(20);
                }
                $image = Image::make($file)->resize(
                    800,
                    800
                )->encode($file->getClientOriginalExtension(), 100);


                $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                if ($this->is_animated_gif($file)) {
                    Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');
                    $fullPathStatic = $path.$filename.'-static.'.$file->getClientOriginalExtension();
                    Storage::disk('public')->put($fullPathStatic, (string) $image, 'public');
                } else {
                    Storage::disk('public')->put($fullPath, (string) $image, 'public');
                }

                array_push($filesPath, $fullPath);
                /*Thumbnail image*/
                // $scale = intval($thumbnails->scale) / 100;
                $image = Image::make($file)->resize(
                    400,
                    400
                )->encode($file->getClientOriginalExtension(), 75);
                // } elseif (isset($options->thumbnails) && isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
                //     $crop_width = $thumbnails->crop->width;
                //     $crop_height = $thumbnails->crop->height;
                //     $image = Image::make($file)
                //         ->fit($crop_width, $crop_height)
                //         ->encode($file->getClientOriginalExtension(), 75);
                // }
                Storage::disk('public')->put(
                    $path.$filename.'-'.'small'.'.'.$file->getClientOriginalExtension(),
                    (string) $image,
                    'public'
                );
            }

            $images = json_decode($category->images);

            if($images != null || $images != ""){
                $images = json_encode(array_merge($images,$filesPath));
            }else{
                $images = json_encode($filesPath);
            }

            $category->images = $images;
        }

        $category->save();
        return redirect()->route('categories.index')->with('message','Категория успешно изменена');
    }


    public function browse(){
    	$categories = Category::orderByDesc('created_at')->get();
    	return DataTables::of($categories)->rawColumns(['text_ru','text_uz', 'text_en'])->make(true);
    }


    private function is_animated_gif($filename)
    {
        $raw = file_get_contents($filename);

        $offset = 0;
        $frames = 0;
        while ($frames < 2) {
            $where1 = strpos($raw, "\x00\x21\xF9\x04", $offset);
            if ($where1 === false) {
                break;
            } else {
                $offset = $where1 + 1;
                $where2 = strpos($raw, "\x00\x2C", $offset);
                if ($where2 === false) {
                    break;
                } else {
                    if ($where1 + 8 == $where2) {
                        $frames++;
                    }
                    $offset = $where2 + 1;
                }
            }
        }

        return $frames > 1;
    }
    public function deleteImage($id, $image){

        $product = Category::findOrFail($id);
        // Decode field value
        $fieldData = @json_decode($product->images, true);

        // // Flip keys and values
        // $fieldData = array_flip($fieldData);

        // Remove image from array

        $this->deleteFileIfExists($fieldData[$image]);
        unset($fieldData[$image]);

        // Generate json and update field
        $product->images = json_encode(array_values($fieldData));

        $product->save();
        return redirect()->back()->with('message', 'Изображение успешно удалено')->withInput();

    }
    public function destroy($id = null){
        if($id != null){
            $category = Category::findOrFail($id);
            $this->deleteFileIfExists($category->image);
            $images = json_decode($category->images);
            if($images != null){
                foreach ($images as $key => $image) {
                    $this->deleteFileIfExists($image);
                }
            }
            $category->delete();

            return redirect()->back()->with('message', 'Категория успешно удалена');
        }
        return redirect()->back();
    }
    public function deleteFileIfExists($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);

            $ext = explode('.', $path);
            $extension = '.'.$ext[count($ext) - 1];
            $path = str_replace($extension, '', $path);
            $thumb_name = 'small';
            if (Storage::disk('public')->exists($path.'-'.$thumb_name.$extension)) {
                Storage::disk('public')->delete($path.'-'.$thumb_name.$extension);
            }
        }

    }
    public function edit($id = null)
    {
        $product = Category::findOrFail($id);
        return view('categories.edit')->withProduct($product)->withCategories(Category::orderBy('id')->get());
    }
}

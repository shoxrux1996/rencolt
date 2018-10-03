<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Objec;
use App\Video;
use App\Message;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderNotification;
class WebController extends Controller
{
    public function index(){
    	return view('index')->withCategories(Category::orderBy('id')->get());
    }
    public function products($category){
        $products = Product::whereHas('categories', function($query) use ($category){
            $query->where('name_ru', "$category");
        })->orderByDesc('id')->get();

        return view('products')->withCategories(Category::orderBy('id')->get())
        ->withProducts($products)->withCategory(Category::where('name_ru', $category)->first());


    }
    public function product($id){
        $product = Product::findOrFail($id);
        $products = Product::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id','!=', $id);

        return view('product_detail')->withCategories(Category::orderBy('id')->get())
        ->withProduct($product)
        ->withRelatedProducts($products->take(4)->get());

    }

    public function objects($category){
        $products = Objec::whereHas('categories', function($query) use ($category){
            $query->where('name_ru', "$category");
        })->orderByDesc('id')->get();
        return view('objects')->withCategories(Category::orderBy('id')->get())

        ->withProducts($products);
    }
    public function object($id){
        $product = Objec::findOrFail($id);
        $products = Objec::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id','!=', $id);

        return view('object_detail')->withCategories(Category::all())->withNewProducts(Objec::orderByDesc('created_at')->take(4)->get())->withProduct($product)
        ->withRelatedProducts($products->take(4)->get());
    }


    public function videos($category){
        $products = Video::whereHas('categories', function($query) use ($category){
            $query->where('name_ru', "$category");
        })->orderByDesc('id')->get();
    	return view('videos')->withCategories(Category::orderBy('id')->get())->withVideos($products);
    }
    public function video($id){
        $product = Video::findOrFail($id);
        $products = Video::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id','!=', $id);

        return view('video_detail')->withCategories(Category::orderBy('id')->get())
        ->withVideo($product)
        ->withRelatedVideos($products->take(4)->get());
    }



    public function aboutus(){
        return view('aboutus')->withCategories(Category::all());
    }
    public function partners(){
        return view('partners')->withCategories(Category::all());
    }

    public function telegram(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'phone' => 'required',
            'text' => 'required'
        ]);
        $product = null;
        if($validator->fails()){
             return redirect()->back()
                        ->withErrors($validator, 'telegram')
                        ->withInput();
        }
        if($request->class != null && $request->id != null){
            if($request->class == 'App\Objec'){
                $product= Objec::findOrFail($request->id);
            }else{
                $product= Product::findOrFail($request->id);
            }
        }
        $message = new Message($request->all());
        $message->notify( new OrderNotification($product));
        $message->save();

       return redirect()->back()->with('message','Ваше сообщение успешно отправлено. Наши менеджеры свяжутся с вами в ближайшее время.');

    }

}

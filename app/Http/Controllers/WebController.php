<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Objec as Object;
use App\Video;
use App\Message;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderNotification;
class WebController extends Controller
{
    public function index(){
        $products = Product::orderByDesc('created_at')->take(3)->get();
        $objects = Object::orderByDesc('created_at')->take(3)->get();
        $videos = Video::orderByDesc('created_at')->take(3)->get();
        $products = collect($products);
        $objects = collect($objects);
        $videos = collect($videos);
        $products = $products->merge($objects);
        $products = $products->merge($videos);
        $products = $products->shuffle(); 


    	return view('index')->withProducts($products)
    	->withCategories(Category::all());
    }
    public function products(){
    	return view('products')->withCategories(Category::all())->withNewProducts(Product::orderByDesc('created_at')->take(4)->get())->withProducts(Product::orderByDesc('id')->paginate(12));
    }
    public function product($id){
        $product = Product::findOrFail($id);
        $products = Product::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id','!=', $id);
        
        return view('product_detail')->withCategories(Category::all())->withNewProducts(Product::orderByDesc('created_at')->take(4)->get())->withProduct($product)
        ->withRelatedProducts($products->take(4)->get());

    }
    public function productsSearch(Request $request){

    	$products = Product::orderByDesc('id');

    	if($request->search != null && $request->search != ''){
    		$search = $request->search;
    	
    		$products = $products->where('name_ru', 'LIKE', "%$search%")
    			->orWhere('name_uz', 'LIKE', "%$search%")
    			->orWhere('name_en', 'LIKE', "%$search%")
    			->orWhere('text_ru', 'LIKE', "%$search%")
    			->orWhere('text_uz', 'LIKE', "%$search%")
    			->orWhere('text_en','LIKE', "%$search%")
    			->orWhereHas('categories', function($query) use ($search){
	    			$query->where('name_ru', 'LIKE', "%$search%")
		    			->orWhere('name_uz', 'LIKE', "%$search%")
		    			->orWhere('name_en', 'LIKE', "%$search%")
		    			->orWhere('text_ru', 'LIKE', "%$search%")
		    			->orWhere('text_uz','LIKE', "%$search%")
		    			->orWhere('text_en','LIKE', "%$search%");
				});
    	}
    	if($request->category != null && $request->category != ''){
    	    $category = $request->category;
    		$products = $products->whereHas('categories', function($query) use ($category){
    			$query->where('name_ru', "$category");
    		});
    	}
    	$products = $products->paginate(12);

    	return view('products')->withCategories(Category::all())->withNewProducts(Product::orderByDesc('created_at')->take(4)->get())->withProducts($products);
    }
    public function objects(){
    	return view('objects')->withCategories(Category::all())->withNewProducts(Object::orderByDesc('created_at')->take(4)->get())->withProducts(Object::orderByDesc('id')->paginate(12));
    }
    public function object($id){
        $product = Object::findOrFail($id);
        $products = Object::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id','!=', $id);
        
        return view('object_detail')->withCategories(Category::all())->withNewProducts(Object::orderByDesc('created_at')->take(4)->get())->withProduct($product)
        ->withRelatedProducts($products->take(4)->get());
    }
    public function objectsSearch(Request $request){

    	$products = Object::orderByDesc('id');

    	if($request->search != null && $request->search != ''){
    		$search = $request->search;
    	
    		$products = $products->where('name_ru', 'LIKE', "%$search%")
    			->orWhere('name_uz', 'LIKE', "%$search%")
    			->orWhere('name_en', 'LIKE', "%$search%")
    			->orWhere('text_ru', 'LIKE', "%$search%")
    			->orWhere('text_uz', 'LIKE', "%$search%")
    			->orWhere('text_en','LIKE', "%$search%")
    			->orWhereHas('categories', function($query) use ($search){
	    			$query->where('name_ru', 'LIKE', "%$search%")
		    			->orWhere('name_uz', 'LIKE', "%$search%")
		    			->orWhere('name_en', 'LIKE', "%$search%")
		    			->orWhere('text_ru', 'LIKE', "%$search%")
		    			->orWhere('text_uz','LIKE', "%$search%")
		    			->orWhere('text_en','LIKE', "%$search%");
				});
    	}
    	if($request->category != null && $request->category != ''){
    	    $category = $request->category;
    		$products = $products->whereHas('categories', function($query) use ($category){
    			$query->where('name_ru', "$category");
    		});
    	}
    	$products = $products->paginate(12);

    	return view('objects')->withCategories(Category::all())->withNewProducts(Object::orderByDesc('created_at')->take(4)->get())->withProducts($products);
    }

    public function videos(){
    	return view('videos')->withCategories(Category::all())->withNewProducts(Video::orderByDesc('created_at')->take(4)->get())->withProducts(Video::orderByDesc('id')->paginate(12));
    }
    public function video($id){
        $product = Video::findOrFail($id);
        $products = Video::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id','!=', $id);
        
        return view('video_detail')->withCategories(Category::all())->withNewProducts(Video::orderByDesc('created_at')->take(4)->get())->withProduct($product)
        ->withRelatedProducts($products->take(4)->get());
    }
    public function videosSearch(Request $request){

    	$products = Video::orderByDesc('id');

    	if($request->search != null && $request->search != ''){
    		$search = $request->search;
    	
    		$products = $products->where('name_ru', 'LIKE', "%$search%")
    			->orWhere('name_uz', 'LIKE', "%$search%")
    			->orWhere('name_en', 'LIKE', "%$search%")
    			->orWhere('text_ru', 'LIKE', "%$search%")
    			->orWhere('text_uz', 'LIKE', "%$search%")
    			->orWhere('text_en','LIKE', "%$search%")
    			->orWhereHas('categories', function($query) use ($search){
	    			$query->where('name_ru', 'LIKE', "%$search%")
		    			->orWhere('name_uz', 'LIKE', "%$search%")
		    			->orWhere('name_en', 'LIKE', "%$search%")
		    			->orWhere('text_ru', 'LIKE', "%$search%")
		    			->orWhere('text_uz','LIKE', "%$search%")
		    			->orWhere('text_en','LIKE', "%$search%");
				});
    	}
    	if($request->category != null && $request->category != ''){
    	    $category = $request->category;
    		$products = $products->whereHas('categories', function($query) use ($category){
    			$query->where('name_ru', "$category");
    		});
    	}
    	$products = $products->paginate(12);

    	return view('videos')->withCategories(Category::all())->withNewProducts(Video::orderByDesc('created_at')->take(4)->get())->withProducts($products);
    }
    public function all(Request $request){
        $products = Product::orderByDesc('id');
        $objects = Object::orderByDesc('id');
        $videos = Video::orderByDesc('id');

        if($request->search != null && $request->search != ''){
            $search = $request->search;
            $products = $products->where('name_ru', 'LIKE', "%$search%")
                ->orWhere('name_uz', 'LIKE', "%$search%")
                ->orWhere('name_en', 'LIKE', "%$search%")
                ->orWhere('text_ru', 'LIKE', "%$search%")
                ->orWhere('text_uz', 'LIKE', "%$search%")
                ->orWhere('text_en','LIKE', "%$search%")
                ->orWhereHas('categories', function($query) use ($search){
                    $query->where('name_ru', 'LIKE', "%$search%")
                        ->orWhere('name_uz', 'LIKE', "%$search%")
                        ->orWhere('name_en', 'LIKE', "%$search%")
                        ->orWhere('text_ru', 'LIKE', "%$search%")
                        ->orWhere('text_uz','LIKE', "%$search%")
                        ->orWhere('text_en','LIKE', "%$search%");
                });
            $objects = $objects->where('name_ru', 'LIKE', "%$search%")
                ->orWhere('name_uz', 'LIKE', "%$search%")
                ->orWhere('name_en', 'LIKE', "%$search%")
                ->orWhere('text_ru', 'LIKE', "%$search%")
                ->orWhere('text_uz', 'LIKE', "%$search%")
                ->orWhere('text_en','LIKE', "%$search%")
                ->orWhereHas('categories', function($query) use ($search){
                    $query->where('name_ru', 'LIKE', "%$search%")
                        ->orWhere('name_uz', 'LIKE', "%$search%")
                        ->orWhere('name_en', 'LIKE', "%$search%")
                        ->orWhere('text_ru', 'LIKE', "%$search%")
                        ->orWhere('text_uz','LIKE', "%$search%")
                        ->orWhere('text_en','LIKE', "%$search%");
                });
            $videos = $videos->where('name_ru', 'LIKE', "%$search%")
                ->orWhere('name_uz', 'LIKE', "%$search%")
                ->orWhere('name_en', 'LIKE', "%$search%")
                ->orWhere('text_ru', 'LIKE', "%$search%")
                ->orWhere('text_uz', 'LIKE', "%$search%")
                ->orWhere('text_en','LIKE', "%$search%")
                ->orWhereHas('categories', function($query) use ($search){
                    $query->where('name_ru', 'LIKE', "%$search%")
                        ->orWhere('name_uz', 'LIKE', "%$search%")
                        ->orWhere('name_en', 'LIKE', "%$search%")
                        ->orWhere('text_ru', 'LIKE', "%$search%")
                        ->orWhere('text_uz','LIKE', "%$search%")
                        ->orWhere('text_en','LIKE', "%$search%");
                });
        }
        if($request->category != null && $request->category != ''){
            $category = $request->category;
            $products = $products->whereHas('categories', function($query) use ($category){
                $query->where('name_ru', "$category");
            });
            $objects = $objects->whereHas('categories', function($query) use ($category){
                $query->where('name_ru', "$category");
            });
            $videos = $videos->whereHas('categories', function($query) use ($category){
                $query->where('name_ru', "$category");
            });
        }
        $products = $products->paginate(12,['*'],'products');
        $objects = $objects->paginate(12,['*'],'objects');
        $videos = $videos->paginate(12,['*'],'videos');

        return view('all')->withProducts($products)->withObjects($objects)->withVideos($videos)->withCategories(Category::all());
    }
    public function category($slug){

        return view('category')->withCategories(Category::all())->withProduct(Category::where('slug', $slug)->first());
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
            if($request->class == 'App\Object'){
                $product= Object::findOrFail($request->id);
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

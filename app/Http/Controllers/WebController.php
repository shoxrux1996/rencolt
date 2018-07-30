<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Object;
use App\Video;

class WebController extends Controller
{
    public function index(){

    	return view('index')->withProducts(Product::orderByDesc('created_at')->take(8)->get())
    	->withCategories(Category::all());
    }
    public function products(){
    	return view('products')->withCategories(Category::all())->withNewProducts(Product::orderByDesc('created_at')->take(4)->get())->withProducts(Product::orderByDesc('id')->paginate(12));
    }
    public function product($id){
        $product = Product::findOrFail($id);
        $products = Product::whereHas('categories', function($query) use($product){
            $query->whereIn('id', $product->categories->pluck('id'));
        });
        
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
        });
        
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
        });
        
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

        return view('all')->withProducts($products)->withObjects($objects)->withVideos($videos);
    }
    

}

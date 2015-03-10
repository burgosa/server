<?php namespace App\Http\Controllers;


//services
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

//models and Requests
use App\Product;
use App\CategoryProduct;
use App\Http\Requests;



class ProductController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Product Controller
	|--------------------------------------------------------------------------
	|
	| 
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	public function index()
	{
		$products = Product::all();
		
		return view('catalog.product.index')
		->with('products',$products);
	}

	public function show($id)
	{

		$product = Product::find($id);
		return view('catalog.product.show')->with('product',$product);
	}


	public function store(Requests\StoreProductRequest $request)
	{
		
		//productdetails
		$product = new Product;
		$product->name = $request->name;
		$product->slug = slug($request->name);
		
		//footprint
		$product->updated_by = Auth::user()->id;
		$product->created_by = Auth::user()->id;
		$product->save();

		//categoryProduct
		$categoryProduct = new CategoryProduct;
		$categoryProduct->category_id = $request->category_id;
		$categoryProduct->product_id = $product->id;
		$categoryProduct->save();

		return redirect('catalog/products/'.$product->id);


	}


	public function update($id, Requests\UpdateProductRequest $request)
	{

		//return $request->all();

		$product = Product::find($id);
		$product->name = $request->name;
		$product->slug = slug($request->name);
		$product->description = $request->description;
		$product->price = $request->price;
		$product->is_active = $request->is_active;

		//footprint
		$product->updated_by = Auth::user()->id;
		$product->created_by = Auth::user()->id;
		
		$product->save();

		//categoryProduct
		$categoryProduct = CategoryProduct::where('product_id',$id)->first();

		if( count($categoryProduct) > 0){

			$categoryProduct->category_id = $request->category_id;
			$categoryProduct->save();

		}else{

			$categoryProduct = new CategoryProduct;
			$categoryProduct->category_id = $request->category_id;
			$categoryProduct->product_id = $product->id;
			$categoryProduct->save();

		}

		return redirect('catalog/products/'.$product->id);
		
	}

	public function destroy($id)
	{
		$product = Product::find($id);
        $product->delete();

		return redirect('catalog/products');
	}

}

<?php namespace App\Http\Controllers;


//services
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

//models and Requests
use App\Brand;
use App\Http\Requests;
use \Session;



class BrandController extends Controller {

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
		$brands = Brand::all();
		
		return view('catalog.brand.index')
		->with('brands',$brands);
	}

	public function show($id)
	{

		$brand = Brand::find($id);
		return view('catalog.brand.show')->with('brand',$brand);
	}


	public function store(Requests\StoreBrandRequest $request)
	{
		
		//productdetails
		$brand = new brand;
		$brand->name = $request->name;
		$brand->slug = slug($request->name);
		
		//footprint
		$brand->updated_by = Auth::user()->id;
		$brand->created_by = Auth::user()->id;
		$brand->save();

		Session::flash('success', 'Brand '.$brand->name.' created succesfully');

		return redirect('catalog/brands/'.$brand->id);

	}


	public function update($id, Requests\UpdateBrandRequest $request)
	{

		//return $request->all();

		$brand = Brand::find($id);
		$brand->name = $request->name;
		$brand->slug = slug($request->name);
		$brand->description = $request->description;
		$brand->is_active = $request->is_active;

		//footprint
		$brand->updated_by = Auth::user()->id;
		$brand->created_by = Auth::user()->id;
		
		$brand->save();

		Session::flash('success', 'Brand '.$brand->name.' updated succesfully');

		return redirect('catalog/brands/'.$brand->id);
		
	}

	public function destroy($id)
	{
		$brand = Brand::find($id);
        $brand->delete();

        Session::flash('success', 'Brand '.$brand->name.' deleted succesfully');

		return redirect('catalog/brands');
	}

}

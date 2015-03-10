<?php namespace App\Http\Controllers;


//services
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

//models and Requests
use App\Category;
use App\Http\Requests;



class CategoryController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Category Controller
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
		return view('catalog.category.index');
	}

	public function show($id)
	{
		$category = Category::find($id);
		return view('catalog.category.show')->with('category',$category);
	}


	public function store(Requests\StoreCategoryRequest $request)
	{
			
		$category = new Category;
		$category->name = $request->name;
		$category->category_id = $request->category_id;
		$category->slug = slug($request->name);
		$category->updated_by = Auth::user()->id;
		$category->created_by = Auth::user()->id;
		$category->save();

		return redirect('catalog/categories/'.$category->id);

	}

	public function update($id, Requests\UpdateCategoryRequest $request)
	{
		
		$category = Category::find($id);
		$category->name = $request->name;
		$category->category_id = $request->category_id;
		$category->slug = slug($request->name);
		$category->description = $request->description;
		$category->is_active = $request->is_active;
		$category->updated_by = Auth::user()->id;
		
		$category->save();

		return redirect('catalog/categories/'.$category->id);

	}

}

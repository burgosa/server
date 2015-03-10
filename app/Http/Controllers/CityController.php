<?php namespace App\Http\Controllers;


//services
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

//models and Requests
use App\City;
use App\Http\Requests;
use \Session;



class CityController extends Controller {

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
		$cities = City::all();
		return view('city.index')->with('cities',$cities);
	}

	public function show($id)
	{
		$city = City::find($id);
		return view('city.show')->with('city',$city);
	}


	public function store(Requests\StoreCityRequest $request)
	{
			
		$city = new City;
		$city->name = $request->name;
		$city->slug = slug($request->name);
		$city->updated_by = Auth::user()->id;
		$city->created_by = Auth::user()->id;
		$city->save();

		Session::flash('success', 'City <b>'.$city->name.'</b> created succesfully');

		return redirect('cities/'.$city->id);

	}

	public function update($id, Requests\UpdateCityRequest $request)
	{
		
		$city = city::find($id);
		$city->name = $request->name;
		$city->slug = slug($request->name);
		$city->timezone = $request->timezone;
		$city->locale = $request->locale;
		$city->is_active = $request->is_active;
		$city->updated_by = Auth::user()->id;
		
		$city->save();

		Session::flash('success', 'City <b>'.$city->name.'</b> updated succesfully');

		return redirect('/cities/'.$city->id);

	}

}

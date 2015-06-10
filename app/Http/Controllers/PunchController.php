<?php namespace DutGRIFF\Http\Controllers;

use Carbon\Carbon;
use DutGRIFF\Transformers\PunchesTransformer;
use DutGRIFF\Http\Requests;
use DutGRIFF\Http\Controllers\Controller;

use DutGRIFF\Punch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class PunchController extends ApiController {

    /**
     * @var DutGRIFF\Transformers\PunchesTransformer
     */
    protected $punchesTransformer;

    /**
     * @param PunchesTransformer $punchesTransformer
     */
    function __construct(PunchesTransformer $punchesTransformer)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->punchesTransformer = $punchesTransformer;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $punches = Punch::with('tags')->get();

		return $this->respond([
           'data' => $this->punchesTransformer->transformCollection($punches->toArray())
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if( ! Input::get('start') || ! Input::get('name') || ! Input::get('description') )
        {
           return $this->respondFailedValidation();
        }

        $punch = Punch::create(Input::all());
        $punch = Punch::with('tags')->find($punch->id);

        return $this->respondCreated('Punch Created', $this->punchesTransformer->transform($punch->toArray()));

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$punch = Punch::with('tags')->find($id);

        if(!$punch) {
            return $this->respondNotFound('Punch was not found.');
        }

        return $this->respond([
           'data' => $this->punchesTransformer->transform($punch->toArray())
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

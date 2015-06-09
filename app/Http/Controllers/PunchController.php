<?php namespace DutGRIFF\Http\Controllers;

use Carbon\Carbon;
use DutGRIFF\Transformers\PunchesTransformer;
use DutGRIFF\Http\Requests;
use DutGRIFF\Http\Controllers\Controller;

use DutGRIFF\Punch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PunchController extends Controller {

    /**
     * @var DutGRIFF\Transformers\PunchesTransformer
     */
    protected $punchesTransformer;

    /**
     * @param PunchesTransformer $punchesTransformer
     */
    function __construct(PunchesTransformer $punchesTransformer)
    {
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

		return Response::json([
           'data' => $this->punchesTransformer->transformCollection($punches->toArray())
        ], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
            return Response::json([
                'error' => [
                    'message' => "Punch doesn't exist"
                ]
            ], 404);
        }

        return Response::json([
           'data' => $this->punchesTransformer->transform($punch->toArray())
        ], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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

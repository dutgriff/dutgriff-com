<?php namespace DutGRIFF\Http\Controllers;

use Carbon\Carbon;
use DutGRIFF\Http\Requests;
use DutGRIFF\Http\Controllers\Controller;

use DutGRIFF\Punch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PunchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $punches = Punch::with('tags')->get();

		return Response::json([
           'data' => $this->apiDataCollection($punches)
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
           'data' => $this->apiData($punch->toArray())
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

    private function apiDataCollection($punches)
    {
        return array_map([$this, 'apiData'], $punches->toArray());
    }

    private function apiData($punch) {
        return [
            'start'       => Carbon::parse($punch['start'])->timestamp,
            'end'         => Carbon::parse($punch['end'])->timestamp,
            'name'        => $punch['name'],
            'description' => $punch['description'],
            'tags'        =>
                array_map(function($tag) {
                    return $tag['name'];
                }, $punch['tags'])
        ];
    }

}

<?php namespace DutGRIFF\Http\Controllers;

use DutGRIFF\Http\Requests;
use DutGRIFF\Http\Controllers\Controller;

use DutGRIFF\PunchTag;
use DutGRIFF\Transformers\PunchTagTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PunchTagsController extends ApiController {

    /**
     * @var PunchTagTransformer
     */
    protected $punchTagTransformer;

    /**
     * @param PunchTagTransformer $punchTagTransformer
     */
    function __construct(PunchTagTransformer $punchTagTransformer)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->punchTagTransformer = $punchTagTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $punchTags = PunchTag::all();

        return $this->respond([
            'data' => $this->punchTagTransformer->transformCollection($punchTags->toArray())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if ( ! Input::get('name'))
        {
            return $this->respondFailedValidation();
        }

        $punch = PunchTag::create(Input::all());
        $punch = PunchTag::find($punch->id);

        return $this->respondCreated($this->punchTagTransformer->transform($punch->toArray()), 'Tag Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $punchTag = PunchTag::find($id);

        if ( ! $punchTag)
        {
            return $this->respondNotFound('Tag was not found.');
        }

        return $this->respond([
            'data' => $this->punchTagTransformer->transform($punchTag->toArray())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}

<?php namespace DutGRIFF\Http\Controllers;

use Carbon\Carbon;
use DutGRIFF\Http\Requests\StorePunchRequest;
use DutGRIFF\PunchTag;
use DutGRIFF\Transformers\PunchesTransformer;
use DutGRIFF\Http\Requests;
use DutGRIFF\Http\Controllers\Controller;

use DutGRIFF\Punch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class PunchesController extends ApiController {

    /**
     * @var PunchesTransformer
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
        $date = Input::get('date', 'today');

        try {
            Carbon::parse($date);
        } catch (\Exception $e) {
            return $this->respondFailedValidation('The date provided could not be parsed.');
        }

        $punches = Punch::with('tags')->whereBetween('start', [
            Carbon::parse($date, 'America/Chicago')->startOfDay()->timezone('UTC'),
            Carbon::parse($date, 'America/Chicago')->endOfDay()->timezone('UTC')
        ])->orderBy('start')->get();

        return $this->respond([
            'data' => $this->punchesTransformer->transformCollection($punches->toArray())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePunchRequest $request
     * @return Response
     */
    public function store(StorePunchRequest $request)
    {
        $input = $request->input();

        $tags = $input['tags'];

        $punch = Punch::create($input);
        if($tags)
        {
            foreach ($tags as $index => $tag)
            {
                $tag = PunchTag::find($tag);
                if ( ! $tag) // Validation
                {
                    return $this->respondFailedValidation('Punch Tag does not exist.');
                }
                $tags[$index] = $tag->id;
            }
            $punch->tags()->attach($tags);
        }

        $punch = $punch->fresh(['tags']);

        return $this->respondCreated($this->punchesTransformer->transform($punch->toArray()), 'Punch Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $punch = Punch::with('tags')->find($id);

        if ( ! $punch)
        {
            return $this->respondNotFound('Punch was not found.');
        }

        return $this->respond([
            'data' => $this->punchesTransformer->transform($punch->toArray())
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

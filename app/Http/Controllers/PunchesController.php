<?php namespace DutGRIFF\Http\Controllers;

use Carbon\Carbon;
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
            Carbon::parse($date)->startOfDay(),
            Carbon::parse($date)->endOfDay()
        ])->get();

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
        if ( ! Input::get('start') || ! Input::get('name') || ! Input::get('description'))
        {
            return $this->respondFailedValidation();
        }

        $tags = Input::get('tags');

        $punch = Punch::create(Input::all());
        if($tags)
        {
            if (is_array($tags))
            {
                foreach ($tags as $index => $tag)
                {
                    $tag = PunchTag::find($tag);
                    if ( ! $tag)
                    {
                        return $this->respondNotFound('Punch Tag was not found.');
                    }
                    $tags[$index] = $tag->id;
                }
                $punch->tags()->attach($tags);
            } else {
                $tag = PunchTag::find($tags);
                if ( ! $tags)
                {
                    return $this->respondNotFound('Punch Tag was not found.');
                }
                $punch->tags()->attach($tag->id);
            }
        }

        $punch = Punch::with('tags')->find($punch->id);

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

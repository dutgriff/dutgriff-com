<?php namespace DutGRIFF\Transformers;

use DutGRIFF\Transformers\Transformer;
use Carbon\Carbon;

class PunchesTransformer extends Transformer {

    public function transform($punch)
    {
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
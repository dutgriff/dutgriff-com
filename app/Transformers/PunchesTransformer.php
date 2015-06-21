<?php namespace DutGRIFF\Transformers;

use DutGRIFF\Transformers\Transformer;
use Carbon\Carbon;

class PunchesTransformer extends Transformer {

    public function transform($punch)
    {
        return [
            'id'          => (int) $punch['id'],
            'start'       => $this->getTimestampFromCarbon($punch['start']),
            'end'         => $this->getTimestampFromCarbon($punch['end']),
            'name'        => $punch['name'],
            'description' => $punch['description'],
            'tags'        =>
                array_map(function($tag) {
                    return (int) $tag['id'];
                }, $punch['tags'])
        ];
    }

    private function getTimestampFromCarbon($carbon) {
        if(is_null($carbon))
        {
            return null;
        } else {
            return Carbon::parse()->timestamp;
        }
    }
}
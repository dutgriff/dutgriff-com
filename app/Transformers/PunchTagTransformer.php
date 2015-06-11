<?php namespace DutGRIFF\Transformers;

use DutGRIFF\Transformers\Transformer;

class PunchTagTransformer  extends Transformer {

    public function transform($punchTag)
    {
        return [
            'id'   => (int) $punchTag['id'],
            'name' => $punchTag['name']
        ];
    }

}
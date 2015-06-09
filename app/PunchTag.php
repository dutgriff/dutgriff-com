<?php namespace DutGRIFF;

use Illuminate\Database\Eloquent\Model;

class PunchTag extends Model {

    protected $fillable = ['name'];

    public function punches()
    {
        return $this->belongsToMany('DutGRIFF\Punch');
    }

}
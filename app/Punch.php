<?php namespace DutGRIFF;

use Illuminate\Database\Eloquent\Model;

class Punch extends Model {

    protected $fillable = ['start', 'end', 'name', 'description'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'start', 'end'];
    }

    public function tags()
    {
        return $this->belongsToMany('DutGRIFF\PunchTag')->withTimestamps();
    }

}

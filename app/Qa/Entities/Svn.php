<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;

class Svn extends Model
{

    protected $connection = 'mysql';

    public $table = "svns";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "name",
        "notes"
    ];

    public function status()
    {
        return $this->belongsToMany('App\Qa\Entities\Status');
    }

}

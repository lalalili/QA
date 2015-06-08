<?php namespace App\Models;

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

    public static $rules = [
        "name" => "required"
    ];

    public function status()
    {
        return $this->belongsToMany('App\Models\Status');
    }

}

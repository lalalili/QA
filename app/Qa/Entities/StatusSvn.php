<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;

class StatusSvn extends Model
{

    protected $connection = 'mysql';

    public $table = "status_svn";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "status_id",
        "svn_id",
    ];

    public static $rules = [
        "status_id" => "required",
        "svn_id" => "required"
    ];

}

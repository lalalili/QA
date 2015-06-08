<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $connection = 'mysql';

    public $table = "statuses";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "site_id",
        "version_id",
        "notes"
    ];

    public static $rules = [
        "site_id" => "required",
        "version_id" => "required",
    ];

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function regular()
    {
        return $this->belongsTo('App\Models\Regular');
    }

    public function svn()
    {
        return $this->belongsToMany('App\Models\Svn');
    }


}

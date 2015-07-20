<?php namespace App\Qa\Entities;

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

    public function site()
    {
        return $this->belongsTo('App\Qa\Entities\Site');
    }

    public function regular()
    {
        return $this->belongsTo('App\Qa\Entities\Regular');
    }

    public function svn()
    {
        return $this->belongsToMany('App\Qa\Entities\Svn');
    }


}

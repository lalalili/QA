<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    protected $connection = 'mysql';

    public $table = "companies";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "site",
        "acct_company_id",
        "name",
        "code",
        "display_name"
    ];

}

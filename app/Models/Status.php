<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
	public $table = "statuses";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "site_id",
		"version_id",
		"subversion_id",
		"notes"
	];

	public static $rules = [
	    "site_id" => "required",
		"version_id" => "required",
		"subversion_id" => "required"
	];

}

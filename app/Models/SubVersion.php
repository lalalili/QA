<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubVersion extends Model
{
    
	public $table = "sub_versions";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "version_id",
		"name",
		"notes"
	];

	public static $rules = [
	    "version_id" => "required",
		"name" => "required"
	];

}

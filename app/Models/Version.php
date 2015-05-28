<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    
	public $table = "versions";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"notes"
	];

	public static $rules = [
	    "name" => "required"
	];

}

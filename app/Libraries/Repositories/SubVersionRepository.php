<?php

namespace App\Libraries\Repositories;


use App\Models\SubVersion;
use Illuminate\Support\Facades\Schema;

class SubVersionRepository
{

	/**
	 * Returns all SubVersions
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return SubVersion::all();
	}

	public function search($input)
    {
        $query = SubVersion::query();

        $columns = Schema::getColumnListing('sub_versions');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores SubVersion into database
	 *
	 * @param array $input
	 *
	 * @return SubVersion
	 */
	public function store($input)
	{
		return SubVersion::create($input);
	}

	/**
	 * Find SubVersion by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|SubVersion
	 */
	public function findSubVersionById($id)
	{
		return SubVersion::find($id);
	}

	/**
	 * Updates SubVersion into database
	 *
	 * @param SubVersion $subVersion
	 * @param array $input
	 *
	 * @return SubVersion
	 */
	public function update($subVersion, $input)
	{
		$subVersion->fill($input);
		$subVersion->save();

		return $subVersion;
	}
}
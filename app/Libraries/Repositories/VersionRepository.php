<?php

namespace App\Libraries\Repositories;


use App\Models\Version;
use Illuminate\Support\Facades\Schema;

class VersionRepository
{

	/**
	 * Returns all Versions
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Version::all();
	}

	public function search($input)
    {
        $query = Version::query();

        $columns = Schema::getColumnListing('versions');
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
	 * Stores Version into database
	 *
	 * @param array $input
	 *
	 * @return Version
	 */
	public function store($input)
	{
		return Version::create($input);
	}

	/**
	 * Find Version by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Version
	 */
	public function findVersionById($id)
	{
		return Version::find($id);
	}

	/**
	 * Updates Version into database
	 *
	 * @param Version $version
	 * @param array $input
	 *
	 * @return Version
	 */
	public function update($version, $input)
	{
		$version->fill($input);
		$version->save();

		return $version;
	}
}
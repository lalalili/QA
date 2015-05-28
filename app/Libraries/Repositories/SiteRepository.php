<?php

namespace App\Libraries\Repositories;


use App\Models\Site;
use Illuminate\Support\Facades\Schema;

class SiteRepository
{

	/**
	 * Returns all Sites
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Site::all();
	}

	public function search($input)
    {
        $query = Site::query();

        $columns = Schema::getColumnListing('sites');
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
	 * Stores Site into database
	 *
	 * @param array $input
	 *
	 * @return Site
	 */
	public function store($input)
	{
		return Site::create($input);
	}

	/**
	 * Find Site by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Site
	 */
	public function findSiteById($id)
	{
		return Site::find($id);
	}

	/**
	 * Updates Site into database
	 *
	 * @param Site $site
	 * @param array $input
	 *
	 * @return Site
	 */
	public function update($site, $input)
	{
		$site->fill($input);
		$site->save();

		return $site;
	}
}
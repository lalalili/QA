<?php

namespace App\Libraries\Repositories;


use App\Models\Status;
use Illuminate\Support\Facades\Schema;

class StatusRepository
{

	/**
	 * Returns all Statuses
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Status::all();
	}

	public function search($input)
    {
        $query = Status::query();

        $columns = Schema::getColumnListing('statuses');
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
	 * Stores Status into database
	 *
	 * @param array $input
	 *
	 * @return Status
	 */
	public function store($input)
	{
		return Status::create($input);
	}

	/**
	 * Find Status by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Status
	 */
	public function findStatusById($id)
	{
		return Status::find($id);
	}

	/**
	 * Updates Status into database
	 *
	 * @param Status $status
	 * @param array $input
	 *
	 * @return Status
	 */
	public function update($status, $input)
	{
		$status->fill($input);
		$status->save();

		return $status;
	}
}
<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStatusRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\StatusRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class StatusController extends AppBaseController
{

	/** @var  StatusRepository */
	private $statusRepository;

	function __construct(StatusRepository $statusRepo)
	{
		$this->statusRepository = $statusRepo;
	}

	/**
	 * Display a listing of the Status.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->statusRepository->search($input);

		$statuses = $result[0];

		$attributes = $result[1];

		return view('statuses.index')
		    ->with('statuses', $statuses)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Status.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('statuses.create');
	}

	/**
	 * Store a newly created Status in storage.
	 *
	 * @param CreateStatusRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStatusRequest $request)
	{
        $input = $request->all();

		$status = $this->statusRepository->store($input);

		Flash::message('Status saved successfully.');

		return redirect(route('statuses.index'));
	}

	/**
	 * Display the specified Status.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$status = $this->statusRepository->findStatusById($id);

		if(empty($status))
		{
			Flash::error('Status not found');
			return redirect(route('statuses.index'));
		}

		return view('statuses.show')->with('status', $status);
	}

	/**
	 * Show the form for editing the specified Status.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$status = $this->statusRepository->findStatusById($id);

		if(empty($status))
		{
			Flash::error('Status not found');
			return redirect(route('statuses.index'));
		}

		return view('statuses.edit')->with('status', $status);
	}

	/**
	 * Update the specified Status in storage.
	 *
	 * @param  int    $id
	 * @param CreateStatusRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateStatusRequest $request)
	{
		$status = $this->statusRepository->findStatusById($id);

		if(empty($status))
		{
			Flash::error('Status not found');
			return redirect(route('statuses.index'));
		}

		$status = $this->statusRepository->update($status, $request->all());

		Flash::message('Status updated successfully.');

		return redirect(route('statuses.index'));
	}

	/**
	 * Remove the specified Status from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$status = $this->statusRepository->findStatusById($id);

		if(empty($status))
		{
			Flash::error('Status not found');
			return redirect(route('statuses.index'));
		}

		$status->delete();

		Flash::message('Status deleted successfully.');

		return redirect(route('statuses.index'));
	}

}

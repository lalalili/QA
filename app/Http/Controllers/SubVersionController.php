<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSubVersionRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\SubVersionRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class SubVersionController extends AppBaseController
{

	/** @var  SubVersionRepository */
	private $subVersionRepository;

	function __construct(SubVersionRepository $subVersionRepo)
	{
		$this->subVersionRepository = $subVersionRepo;
	}

	/**
	 * Display a listing of the SubVersion.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->subVersionRepository->search($input);

		$subVersions = $result[0];

		$attributes = $result[1];

		return view('subVersions.index')
		    ->with('subVersions', $subVersions)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new SubVersion.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('subVersions.create');
	}

	/**
	 * Store a newly created SubVersion in storage.
	 *
	 * @param CreateSubVersionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSubVersionRequest $request)
	{
        $input = $request->all();

		$subVersion = $this->subVersionRepository->store($input);

		Flash::message('SubVersion saved successfully.');

		return redirect(route('subVersions.index'));
	}

	/**
	 * Display the specified SubVersion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subVersion = $this->subVersionRepository->findSubVersionById($id);

		if(empty($subVersion))
		{
			Flash::error('SubVersion not found');
			return redirect(route('subVersions.index'));
		}

		return view('subVersions.show')->with('subVersion', $subVersion);
	}

	/**
	 * Show the form for editing the specified SubVersion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subVersion = $this->subVersionRepository->findSubVersionById($id);

		if(empty($subVersion))
		{
			Flash::error('SubVersion not found');
			return redirect(route('subVersions.index'));
		}

		return view('subVersions.edit')->with('subVersion', $subVersion);
	}

	/**
	 * Update the specified SubVersion in storage.
	 *
	 * @param  int    $id
	 * @param CreateSubVersionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateSubVersionRequest $request)
	{
		$subVersion = $this->subVersionRepository->findSubVersionById($id);

		if(empty($subVersion))
		{
			Flash::error('SubVersion not found');
			return redirect(route('subVersions.index'));
		}

		$subVersion = $this->subVersionRepository->update($subVersion, $request->all());

		Flash::message('SubVersion updated successfully.');

		return redirect(route('subVersions.index'));
	}

	/**
	 * Remove the specified SubVersion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$subVersion = $this->subVersionRepository->findSubVersionById($id);

		if(empty($subVersion))
		{
			Flash::error('SubVersion not found');
			return redirect(route('subVersions.index'));
		}

		$subVersion->delete();

		Flash::message('SubVersion deleted successfully.');

		return redirect(route('subVersions.index'));
	}

}

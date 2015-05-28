<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVersionRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\VersionRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class VersionController extends AppBaseController
{

	/** @var  VersionRepository */
	private $versionRepository;

	function __construct(VersionRepository $versionRepo)
	{
		$this->versionRepository = $versionRepo;
	}

	/**
	 * Display a listing of the Version.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->versionRepository->search($input);

		$versions = $result[0];

		$attributes = $result[1];

		return view('versions.index')
		    ->with('versions', $versions)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Version.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('versions.create');
	}

	/**
	 * Store a newly created Version in storage.
	 *
	 * @param CreateVersionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateVersionRequest $request)
	{
        $input = $request->all();

		$version = $this->versionRepository->store($input);

		Flash::message('Version saved successfully.');

		return redirect(route('versions.index'));
	}

	/**
	 * Display the specified Version.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$version = $this->versionRepository->findVersionById($id);

		if(empty($version))
		{
			Flash::error('Version not found');
			return redirect(route('versions.index'));
		}

		return view('versions.show')->with('version', $version);
	}

	/**
	 * Show the form for editing the specified Version.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$version = $this->versionRepository->findVersionById($id);

		if(empty($version))
		{
			Flash::error('Version not found');
			return redirect(route('versions.index'));
		}

		return view('versions.edit')->with('version', $version);
	}

	/**
	 * Update the specified Version in storage.
	 *
	 * @param  int    $id
	 * @param CreateVersionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateVersionRequest $request)
	{
		$version = $this->versionRepository->findVersionById($id);

		if(empty($version))
		{
			Flash::error('Version not found');
			return redirect(route('versions.index'));
		}

		$version = $this->versionRepository->update($version, $request->all());

		Flash::message('Version updated successfully.');

		return redirect(route('versions.index'));
	}

	/**
	 * Remove the specified Version from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$version = $this->versionRepository->findVersionById($id);

		if(empty($version))
		{
			Flash::error('Version not found');
			return redirect(route('versions.index'));
		}

		$version->delete();

		Flash::message('Version deleted successfully.');

		return redirect(route('versions.index'));
	}

}

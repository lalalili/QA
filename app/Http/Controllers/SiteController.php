<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSiteRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\SiteRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class SiteController extends AppBaseController
{

	/** @var  SiteRepository */
	private $siteRepository;

	function __construct(SiteRepository $siteRepo)
	{
		$this->siteRepository = $siteRepo;
	}

	/**
	 * Display a listing of the Site.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->siteRepository->search($input);

		$sites = $result[0];

		$attributes = $result[1];

		return view('sites.index')
		    ->with('sites', $sites)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Site.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sites.create');
	}

	/**
	 * Store a newly created Site in storage.
	 *
	 * @param CreateSiteRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSiteRequest $request)
	{
        $input = $request->all();

		$site = $this->siteRepository->store($input);

		Flash::message('Site saved successfully.');

		return redirect(route('sites.index'));
	}

	/**
	 * Display the specified Site.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$site = $this->siteRepository->findSiteById($id);

		if(empty($site))
		{
			Flash::error('Site not found');
			return redirect(route('sites.index'));
		}

		return view('sites.show')->with('site', $site);
	}

	/**
	 * Show the form for editing the specified Site.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$site = $this->siteRepository->findSiteById($id);

		if(empty($site))
		{
			Flash::error('Site not found');
			return redirect(route('sites.index'));
		}

		return view('sites.edit')->with('site', $site);
	}

	/**
	 * Update the specified Site in storage.
	 *
	 * @param  int    $id
	 * @param CreateSiteRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateSiteRequest $request)
	{
		$site = $this->siteRepository->findSiteById($id);

		if(empty($site))
		{
			Flash::error('Site not found');
			return redirect(route('sites.index'));
		}

		$site = $this->siteRepository->update($site, $request->all());

		Flash::message('Site updated successfully.');

		return redirect(route('sites.index'));
	}

	/**
	 * Remove the specified Site from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$site = $this->siteRepository->findSiteById($id);

		if(empty($site))
		{
			Flash::error('Site not found');
			return redirect(route('sites.index'));
		}

		$site->delete();

		Flash::message('Site deleted successfully.');

		return redirect(route('sites.index'));
	}

}

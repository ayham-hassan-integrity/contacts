<?php

namespace App\Domains\Perosn\Http\Controllers\Backend\Perosn;

use App\Http\Controllers\Controller;
use App\Domains\Perosn\Models\Perosn;
use App\Domains\Perosn\Services\PerosnService;

/**
 * Class DeletedPerosnController.
 */
class DeletedPerosnController extends Controller
{
    /**
     * @var PerosnService
     */
    protected $perosnService;

    /**
     * DeletedPerosnController constructor.
     *
     * @param  PerosnService  $perosnService
     */
    public function __construct(PerosnService $perosnService)
    {
        $this->perosnService = $perosnService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.perosn.deleted');
    }

    /**
     * @param  Perosn  $deletedPerosn
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Perosn $deletedPerosn)
    {
        $this->perosnService->restore($deletedPerosn);

        return redirect()->route('admin.perosn.index')->withFlashSuccess(__('The  Perosns was successfully restored.'));
    }

    /**
     * @param  Perosn  $deletedPerosn
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Perosn $deletedPerosn)
    {
        $this->perosnService->destroy($deletedPerosn);

        return redirect()->route('admin.perosn.deleted')->withFlashSuccess(__('The  Perosns was permanently deleted.'));
    }
}
<?php

namespace App\Domains\Perosn\Services;

use App\Domains\Perosn\Models\Perosn;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PerosnService.
 */
class PerosnService extends BaseService
{
    /**
     * PerosnService constructor.
     *
     * @param Perosn $perosn
     */
    public function __construct(Perosn $perosn)
    {
        $this->model = $perosn;
    }

    /**
     * @param array $data
     *
     * @return Perosn
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Perosn
    {
        DB::beginTransaction();

        try {
            $perosn = $this->model::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this perosn. Please try again.'));
        }

        DB::commit();

        return $perosn;
    }

    /**
     * @param Perosn $perosn
     * @param array $data
     *
     * @return Perosn
     * @throws \Throwable
     */
    public function update(Perosn $perosn, array $data = []): Perosn
    {
        DB::beginTransaction();

        try {
            $perosn->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this perosn. Please try again.'));
        }

        DB::commit();

        return $perosn;
    }

    /**
     * @param Perosn $perosn
     *
     * @return Perosn
     * @throws GeneralException
     */
    public function delete(Perosn $perosn): Perosn
    {
        if ($this->deleteById($perosn->id)) {
            return $perosn;
        }

        throw new GeneralException('There was a problem deleting this perosn. Please try again.');
    }

    /**
     * @param Perosn $perosn
     *
     * @return Perosn
     * @throws GeneralException
     */
    public function restore(Perosn $perosn): Perosn
    {
        if ($perosn->restore()) {
            return $perosn;
        }

        throw new GeneralException(__('There was a problem restoring this  Perosns. Please try again.'));
    }

    /**
     * @param Perosn $perosn
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Perosn $perosn): bool
    {
        if ($perosn->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Perosns. Please try again.'));
    }
}
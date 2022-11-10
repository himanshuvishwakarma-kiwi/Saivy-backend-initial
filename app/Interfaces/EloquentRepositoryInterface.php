<?php

namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface EloquentRepositoryInterface 
{
     /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model;

    /**
    * @return Model
    */
    public function findAll():Collection;

    /**
    * @param array $attributes
    * @return Model
    */
    public function create(array $attributes): Model;

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool;
    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function delete(int $modelId): bool;

}
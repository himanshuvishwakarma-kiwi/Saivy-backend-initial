<?php

namespace App\Repository;

use App\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BaseRepository implements EloquentRepositoryInterface{ 
    /**
     * @var Model
     */
    protected $model;
    
    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param $id
    * @return Model
    */

    public function findAll():Collection
    {
        return $this->model->get();
    }

    /**
     * Create a model.
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes):Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $attributes
     * @return bool
     */
    public function update(int $modelId, array $attributes): bool
    {
        $model = $this->find($modelId);

        return $model->update($attributes);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function delete(int $modelId): bool
    {
        return $this->find($modelId)->delete();
    }

}
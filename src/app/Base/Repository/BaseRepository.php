<?php

namespace Ae3\Survey\app\Base\Repository;

use Closure;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Support\HigherOrderTapProxy;

class BaseRepository
{
    protected $model;
    private $orderColumn;

    public function __construct()
    {
        $this->orderColumn = config('form.database.order_column');
    }

    public function setModel($model)
    {
        $this->model = resolve($model);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all(array $columns = ["*"])
    {
        return $this->model->get($columns);
    }

    /**
     * @param int|string $id
     * @param array $columns
     * @return mixed
     */
    public function find(int|string $id, array $columns = ["*"])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param array|Closure|Expression|string $column
     * @param $operator
     * @param $value
     * @param $boolean
     * @return mixed
     */
    public function where(array|Closure|Expression|string $column, $operator = null, $value = null, $boolean = "and"): mixed
    {
        return $this->model->where($column, $operator, $value, $boolean)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param array $attributes
     * @param array $data
     * @return mixed
     */
    public function firstOrCreate(array $attributes, array $data): mixed
    {
        return $this->model->firstOrCreate($attributes, $data);
    }

    /**
     * @param array $ids
     * @param string $column
     * @return HigherOrderTapProxy|mixed
     */
    public function reorder(array $ids, string $column = null): mixed
    {
        if (!$column) $column = $this->orderColumn;
        $models = $this->model->whereIn('id', $ids)->get();

        $models->map(function ($model) use ($ids, $column) {
            $model->$column = collect($ids)->search($model->id) + 1;
            $model->save();
        });

        return $models->fresh()->sortBy($column);
    }
}
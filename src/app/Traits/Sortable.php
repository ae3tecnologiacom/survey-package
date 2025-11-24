<?php

namespace Ae3\Survey\app\Traits;

trait Sortable
{
    /**
     * @return void
     */
    public static function bootSortable()
    {
        $oderColumn = config('form.database.order_column');
        static::creating(function ($model) use ($oderColumn) {
            if ($model->parentColumn !== null) {
                $parentColumn = $model->parentColumn;
                $order = $model::where([$parentColumn => $model->$parentColumn])->max($oderColumn);
            } else {
                $order = $model::max($oderColumn);
            }
            $model->order_num = ++$order;
        });

        static::deleting(function ($model) {
            $oderColumn = config('form.database.order_column');
            if ($model->parentColumn !== null) {
                $parentColumn = $model->parentColumn;
                $itens = $model::select('id')->where([$parentColumn => $model->$parentColumn])
                    ->where($oderColumn, '>', $model->order_num)->orderBy($oderColumn)->get();

            } else {
                $itens = $model::select('id')->where($oderColumn, '>', $model->order_num)
                    ->orderBy($oderColumn)->get();

            }
            foreach ($itens as $item) {
                $item = $model::findOrFail($item->id);
                $item->order_num -= 1;
                $item->save();
            }
        });
    }
}

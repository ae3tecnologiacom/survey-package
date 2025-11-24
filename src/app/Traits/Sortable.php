<?php

namespace Ae3\Survey\app\Traits;

trait Sortable
{
    /**
     * @return void
     */
    public static function bootSortable()
    {
        static::creating(function ($model) {
            if ($model->parentColumn !== null) {
                $parentColumn = $model->parentColumn;
                $order = $model::where([$parentColumn => $model->$parentColumn])->max('order_num');
            } else {
                $order = $model::max('order_num');
            }
            $model->order_num = ++$order;
        });

        static::deleting(function ($model) {
            if ($model->parentColumn !== null) {
                $parentColumn = $model->parentColumn;
                $itens = $model::select('id')->where([$parentColumn => $model->$parentColumn])
                    ->where('order_num', '>', $model->order_num)->orderBy('order_num')->get();

            } else {
                $itens = $model::select('id')->where('order_num', '>', $model->order_num)
                    ->orderBy('order_num')->get();

            }
            foreach ($itens as $item) {
                $item = $model::findOrFail($item->id);
                $item->order_num -= 1;
                $item->save();
            }
        });
    }
}

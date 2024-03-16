<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = route('admin.sliders.edit', $query->id);
                $delete = route('admin.sliders.destroy', $query->id);
                $editBtn = "<a href='#' onclick='editModal(event, $query->id)' class='text-primary edit'><i class='icon-pencil-alt'></i></a>";
                $deleteBtn = "<a href='$delete' class='text-danger delete-item'><i class='icon-trash'></i></a>";

                return $editBtn.$deleteBtn;
                
            })
            ->addColumn('banner', function($query){
                $img = "<img style='width: 100px; height: 70px' src='".asset($query->banner)."' ></img>";
                return $img;
            })
            ->addColumn('status', function($query){
                $active = '<i class="badge bg-success">Active</i>';
                $inactive = '<i class="badge bg-danger">Inactive</i>';

                return $query->status == 1 ? $active : $inactive;
            })
            ->rawColumns(['banner', 'action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('banner'),
            Column::make('title'),
            Column::make('type'),
            Column::make('btn_url'),
            Column::make('starting_price'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}

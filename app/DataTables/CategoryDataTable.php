<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('icon', function ($query) {
                return "$query->icon";
            })
            ->addColumn('action', function ($query) {
                $edit = route('admin.category.edit', $query->id);
                $delete = route('admin.category.destroy', $query->id);
                $editBtn = "<a href='#' onclick='editModal(event, $query->id)' class='text-primary edit'><i class='icon-pencil-alt'></i></a>";
                $deleteBtn = "<a href='$delete' class='text-danger delete-item'><i class='icon-trash'></i></a>";

                return $editBtn . $deleteBtn;
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    $button = '<label class="switch icon-state">
                        <input type="checkbox" checked class="custom-switch-input change-status" data-id="' . $query->id . '" name="status">
                        <span class="switch-state"></span>
                    </label>';
                }else{
                    $button = '<label class="switch icon-state">
                        <input type="checkbox" class="custom-switch-input change-status" data-id="' . $query->id . '" name="status">
                        <span class="switch-state"></span>
                    </label>';
                }
                
                return $button;
            })
            ->rawColumns(['action', 'status', 'icon'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
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
            Column::make('id')->width(50),
            Column::make('icon')->width(200),
            Column::make('name'),
            Column::make('status')->width(100),
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
        return 'Category_' . date('YmdHis');
    }
}

<?php

namespace Eldegweydev\Coupon\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Eldegweydev\Coupon\Models\Coupon;

class CouponDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('start', function ($query) {
                return date('Y-m-d', strtotime($query->start)) ;
            })
            ->editColumn('type', function ($query) {
                return ucfirst($query->type) ;
            })
            ->editColumn('end', function ($query) {
                return date('Y-m-d', strtotime($query->start)) ;
            })            
            ->addColumn('action', 'coupons::action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\CouponDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Coupon $model)
    {
        return $model->select(['coupons.*'])->orderBy('id','DESC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('coupondatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [


            [
                'name' => 'DT_RowIndex',
                'data' => 'DT_RowIndex',
                'title' => 'Index'
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name'
            ],
            [
                'name' => 'code',
                'data' => 'code',
                'title' => 'Code'
            ],
            [
                'name' => 'start',
                'data' => 'start',
                'title' => 'Start Date'
            ],
            [
                'name' => 'end',
                'data' => 'end',
                'title' => 'End Date'
            ],
            [
                'name' => 'type',
                'data' => 'type',
                'title' => 'Type'
            ],
            Column::computed('action')
              ->exportable(false)
              ->printable(false)
              ->width(60)
              ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Coupon_' . date('YmdHis');
    }
}

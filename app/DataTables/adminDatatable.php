<?php

namespace App\DataTables;

use App\Model\Admin;
use Yajra\DataTables\Services\DataTable;

class adminDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->rawColumns(['edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query();
    }

    public static function lang(){
        $lang= [
            "sProcessing"=>__('admin.precessing'),
            "sLengthMenu"=>__('admin.lengthMenu'),
            "sZeroRecords"=>__('admin.zeroRecord'),
            "sEmptyTable"=>__('admin.emptyTable'),
            "sInfo"=>__('admin.info'),
            "sInfoEmpty"=>__('admin.infoEmpty'),
            "sInfoFiltered"=>__('admin.infoFilterd'),
            "sInfoPostFix"=>__('admin.infoPostFix'),
            "sSearch"=>__('admin.search'),
            "sUrl"=>__('admin.url'),
            "sInfoThousands"=>__('admin.infoThounds'),
            "sLoadingRecords"=>__('admin.loadRecord'),
            "oPaginate"=> [
                "sFirst"=> __('admin.first'),
                "sLast"=> __('admin.last'),
                "sNext"=> __('admin.next'),
                "sPrevious"=> __('admin.previous')
            ],

        ];

        return $lang;

    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
//                    ->addAction(['width' => '80px'])
//                    ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 'All Record']],
                'buttons'    => [
                    ['extend' => 'print', 'className' => 'btn btn-danger', 'text' => '<i class="fa fa-print">'. __("admin.pdf") .'</i>'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file">'.__("admin.csc") .'</i> '],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file">'.__("admin.excel") .'</i> '],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],

                ],
                'initComplete'=>'function () {
                  this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                 $(input).appendTo($(column.footer()).empty())
                   .on(\'keyup\', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? val : \'\', true, false).draw();
                });
            });
        }',
         'language'=>self::lang()


            ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',

            [
                'title'=>'edit',
                'name'=>'edit',
                'data'=>'edit',
                'printable'=>false,
                'searchable'=>false,
                'exportable'=>false,
                'orderable'=>false
            ],
            [
                'title'=>'delete',
                'name'=>'delete',
                'data'=>'delete',
                'printable'=>false,
                'searchable'=>false,
                'exportable'=>false,
                'orderable'=>false
            ]


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin_' . date('YmdHis');
    }
}

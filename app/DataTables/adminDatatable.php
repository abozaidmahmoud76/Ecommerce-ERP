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
            ->addColumn('checkbox', 'admin.admins.btn.checkbox')
            ->rawColumns(['edit','delete','checkbox']);
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
                    ['className' => 'btn btn-danger delBtn' , 'text' => '<i class="fa fa-trash">delete</i>'],

                ],
//                'initComplete'=>'function () {
//                  this.api().columns().every(function () {
//                  var column = this;
//                  var input = document.createElement("input");
//                 $(input).appendTo($(column.footer()).empty())
//                   .on(\'keyup\', function () {
//                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
//                    column.search(val ? val : \'\', true, false).draw();
//                });
//            });
//        }',
         'language'=>datatable_language()


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
            [
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()">',
                'name'=>'checkbox',
                'data'=>'checkbox',
                'printable'=>false,
                'searchable'=>false,
                'exportable'=>false,
                'orderable'=>false
            ],
            'id',
            'name',
            'email',
            [
                'title'=>__('admin.created_at'),
                'name'=>'created_at',
                'data'=>'created_at',
            ],

            [
                'title'=>__('admin.updated_at'),
                'name'=>'updated_at',
                'data'=>'updated_at',
            ],


            [
                'title'=>__('admin.edit'),
                'name'=>'edit',
                'data'=>'edit',
                'printable'=>false,
                'searchable'=>false,
                'exportable'=>false,
                'orderable'=>false
            ],
            [
                'title'=>__('admin.delete'),
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

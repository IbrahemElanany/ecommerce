<?php

namespace App\DataTables;

use App\Bu;
use App\User;
use Yajra\DataTables\Services\DataTable;

class BuDatatable extends DataTable
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
            ->addColumn('edit', 'admin.bu.btn.edit')
            ->addColumn('delete', 'admin.bu.btn.delete')
            ->rawColumns([
                'edit','delete'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bu $model)
    {
        return Bu::query();
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
                'dom'=>"B<'row'<'col-md-6'f><'col-md-6'l>>rt<'row'<'col-md-6'i><'col-md-6'p>>",
                'lengthMenu'=>[
                    [10,25,50,-1]
                    ,[10,25,50,'All Records']
                ],
                'buttons'=>[
                    [
                        'extend' =>'create',
                        'text'=>'<i class="fa fa-plus">  إضافة عقار</i>',
                        'className'=>'form-group btn btn-info ml-2',
                    ],
                    ['extend'=>'print','className'=>'form-group btn btn-primary ml-2','text'=>'<i class="fa fa-print">  طباعة  </i>'],
//                            ['extend'=>'csv','className'=>'btn btn-info','text'=>'<i class="fa fa-file"> Export CSV</i>'],
                    ['extend'=>'excel','className'=>'form-group btn btn-success ml-2','text'=>'<i class="fa fa-file"> تصدير إكسيل </i>'],
                    ['extend'=>'reload','className'=>'form-group btn btn-default','text'=>'<i class="fa fa-refresh">  إعادة تحميل</i>'],
                ],

                "initComplete"=> "function () {
                            this.api().columns([0,1,2,3,4,5]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                $(input).attr( 'style', 'text-align: center;width: 100%')
                                $(input).attr( 'class','form-control')
//                                $(input).attr( 'placeholder','search')
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                                
                            });
                            
                        }",
                'language'=> [
                    "sProcessing"=>  "جاري التحميل...",
                    "sLengthMenu"=>   "أظهر _MENU_ مُدخلات",
                    "sZeroRecords"=> "لم يُعثر على أية سجلات",
                    "sInfo"=>         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
                    "sInfoEmpty"=>    "يعرض 0 إلى 0 من أصل 0 سجلّ",
                    "sInfoFiltered"=> "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix"=>  "",
                    "sSearch"=>      " ابحث : ",

                    "sUrl"=>         "",
                    "oPaginate"=>[
                        "sFirst"=>    "الأول",
                        "sPrevious"=> "السابق",
                        "sNext" =>    "التالي",
                        "sLast"=>     "الأخير"
                    ],

                ]
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
                'name'  => 'id',
                'data'  => 'id',
                'title' => '#'
            ],
            [
                'name'  => 'bu_name',
                'data'  => 'bu_name',
                'title' => 'إسم العقار'
            ],
            [
                'name'  => 'bu_price',
                'data'  => 'bu_price',
                'title' => 'سعر العقار'
            ],
            [
                'name'  => 'bu_type',
                'data'  => 'bu_type',
                'title' => 'نوع العقار'
            ],
            [
                'name'  => 'bu_place',
                'data'  => 'bu_place',
                'title' => 'منطقة العقار'
            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => 'أضيف في'
            ],
            [
                'name'  => 'bu_status',
                'data'  => 'bu_status',
                'title' => 'حالة العقار'
            ],
            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => 'تعديل',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => 'حذف',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Bu_' . date('YmdHis');
    }


    // Search placeholder
//$('#example tfoot th').each( function () {
//    var title = $('#example thead th').eq( $(this).index() ).text();
//    $(this).html( '<input type="text" style="width: 100%; text-align: center" placeholder="'+title+'" />' );
//} );
}

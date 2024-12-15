<?php
namespace App\DataTables;

use App\Models\Generus;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GenerusDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('nama', function (Generus $generus) {
                return $generus->nama;
            })
            ->editColumn('kelompok', function (Generus $generus) {
                return $generus->kelompok->nama;
            })
            ->editColumn('desa', function (Generus $generus) {
                return $generus->desa->nama;
            })
            ->addColumn('action', function (Generus $generus) {
                return view('pages/apps.generus-management.generus.columns._actions', compact('generus'));
            })
            ->filterColumn('nama', function ($query, $keyword) {
                // Ensure case-insensitive search by converting both to lowercase
                $query->where(DB::raw('LOWER(nama)'), 'LIKE', '%' . strtolower($keyword) . '%');
            })
            ->setRowId('id_generus');

    }
    public function query(Generus $model): QueryBuilder
    {
        return $model->newQuery()->with('desa', 'kelompok');
    }
    
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dpt-generus')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(0)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/generus-management/generus/columns/_draw-scripts.js')) . "}");
    }
    public function getColumns(): array
    {
        $columns = [
            Column::make('nama')->title('Nama Generus')->name('nama')->searchable(false)->sortable(false),
            Column::make('kelompok')->title('Kelompok')->name('kelompok')->searchable(false)->sortable(false),
            Column::make('desa')->title('Desa')->name('desa')->sortable(false)->searchable(true),
            Column::computed('action')
            ->addClass('text-start text-nowrap')
            ->exportable(false)
            ->printable(false)
            ->width(60),
        ];
    
        return $columns;
    }
    

    protected function filename(): string
    {
        return 'Generus_' . date('YmdHis');
    }
}


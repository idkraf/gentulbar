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
use Yajra\DataTables\Html\Button;

class GenerusDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('nama', function (Generus $generus) {
                return $generus->nama;
            })
            ->editColumn('nig', function (Generus $generus) {
                return $generus->nig;
            })
            ->editColumn('nohp', function (Generus $generus) {
                return $generus->nohp;
            })
            ->editColumn('kelompok', function (Generus $generus) {
                return $generus->kelompoks->nama;
            })
            ->editColumn('desa', function (Generus $generus) {
                return $generus->desas->nama;
            })
            ->editColumn('jenjang', function (Generus $generus) {
                return $generus->jenjangs->nama;
            })
            ->editColumn('gender', function (Generus $generus) {
                return $generus->gender == "F" ? "Perempuan":"Laki-laki";
            })
            ->editColumn('tempat_lahir', function (Generus $generus) {
                return $generus->tempat_lahir;
            })
            ->editColumn('tanggal_lahir', function (Generus $generus) {
                return $generus->tanggal_lahir;
            })
            ->editColumn('ayah', function (Generus $generus) {
                return $generus->ayah;
            })
            ->editColumn('ibu', function (Generus $generus) {
                return $generus->ibu;
            })
            ->editColumn('alamat', function (Generus $generus) {
                return $generus->alamat;
            })
            ->editColumn('sekolah', function (Generus $generus) {
                return $generus->sekolah ? "Ya" : "Tidak";
            })
            ->editColumn('mondok', function (Generus $generus) {
                return $generus->mondok ? "Ya" : "Tidak";
            })
            ->editColumn('tugas', function (Generus $generus) {
                return $generus->tugas ? "Ya" : "Tidak";
            })
            ->editColumn('kerja', function (Generus $generus) {
                return $generus->kerja ? "Ya" : "Tidak";
            })
            // 'gender',
            // 'jenjang',
            // 'kelaskbm',
            // 'nig',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'ayah',
            // 'ibu',
            // 'nohp',
            // 'alamat',
            // 'sekolah',
            // 'mondok',
            // 'tugas',
            // 'kerja',
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
        return $model->newQuery()->with('desas', 'kelompoks');
    }
    
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('generus-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(0)
            // ->buttons(
            //     Button::make('excel')->text('Export to Excel'), // Add Excel button
            //     Button::make('print')->text('Print'), // Optionally, add a print button
            //     Button::make('reload')->text('Reload') // Optionally, add a reload button
            // )
            ->parameters([
                'initComplete' => "function () {
                    var api = this.api();
                    // Add filter for Desa
                    $('#filter-desa').on('change', function () {
                        api.column(2).search(this.value).draw();
                    });
                }"
            ])
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/generus-management/generus/columns/_draw-scripts.js')) . "}");
    }

    public function getColumns(): array
    {
        $columns = [
            Column::make('nama')->title('Nama Generus')->name('nama')->searchable(false)->sortable(false),
            Column::make('nig')->title('NIG')->name('nig')->searchable(false)->sortable(false),
            Column::make('nohp')->title('No HP')->name('nohp')->searchable(false)->sortable(false),
            Column::make('kelompok')->title('Kelompok')->name('kelompok')->searchable(true)->sortable(false),
            Column::make('desa')->title('Desa')->name('desa')->searchable(true)->sortable(false),
            Column::make('jenjang')->title('Jenjang')->name('jenjang')->searchable(false)->sortable(false),
            Column::make('gender')->title('Jenis Kelamin')->name('gender')->searchable(false)->sortable(false),
            Column::make('tempat_lahir')->title('Tempat Lahir')->name('tempat_lahir')->searchable(false)->sortable(false),
            Column::make('tanggal_lahir')->title('Tanggal Lahir')->name('tanggal_lahir')->searchable(false)->sortable(false),
            Column::make('ayah')->title('Ayah')->name('ayah')->searchable(false)->sortable(false),
            Column::make('ibu')->title('Ibu')->name('ibu')->searchable(false)->sortable(false),
            Column::make('alamat')->title('Alamat')->name('alamat')->searchable(false)->sortable(false),
            Column::make('alamat')->title('Alamat')->name('alamat')->searchable(false)->sortable(false),
            Column::make('sekolah')->title('Sekolah')->name('sekolah')->searchable(false)->sortable(false),
            Column::make('mondok')->title('Mondok')->name('mondok')->searchable(false)->sortable(false),
            Column::make('tugas')->title('Tugas')->name('setugaskolah')->searchable(false)->sortable(false),
            Column::make('kerja')->title('Kerja')->name('kerja')->searchable(false)->sortable(false),
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


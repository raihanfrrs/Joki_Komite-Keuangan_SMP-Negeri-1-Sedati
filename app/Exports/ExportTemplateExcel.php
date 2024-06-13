<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportTemplateExcel implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        if ($this->type == 'export-wali-murid') {
            return view('components.export.template-wali-murid');
        } elseif ($this->type == 'export-class') {
            return view('components.export.template-class');
        }
    }
}

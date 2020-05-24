<?php

namespace Modules\Pages\Http\Exports;

use Modules\Pages\Entities\Page;
use Maatwebsite\Excel\Concerns\FromCollection;

class PagesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Page::all();
    }
}

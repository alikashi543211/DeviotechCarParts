<?php

namespace App\Exports;

use App\Models\ScrapYardAdvertisement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ScrapYardAdvertisementExcelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.exports.scrapYardAdvertisement', [
            'scrapYardAdvertisements' => ScrapYardAdvertisement::with('carMake', 'carModel', 'carTrim')->get()
        ]);
    }
}

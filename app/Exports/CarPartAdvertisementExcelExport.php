<?php

namespace App\Exports;

use App\Models\CarPartAdvertisement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CarPartAdvertisementExcelExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.exports.carPartAdvertisement', [
            'carPartAdvertisements' => CarPartAdvertisement::with('carMake', 'carModel', 'carTrim')->get()
        ]);
    }
}

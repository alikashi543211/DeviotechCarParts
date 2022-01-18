<?php

namespace App\Exports;

use App\Models\SellerProfile;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class SellerProfileExcel implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('admin.exports.seller', [
            'seller_list' => SellerProfile::with('user')->get()
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getProvinces(Request $request) {
        return Province::get();
    }

    public function findAreaByProvince(Request $request, Province $province) {
        return $province->areas;
    }

    public function findDistrictByArea(Request $request, Area $area) {
        return $area->districts;
    }
}

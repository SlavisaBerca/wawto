<?php 

use App\User;
use App\Models\Generalsetting;
use App\Models\Platform\Brand;
use App\Models\Platform\Curier;
use App\Models\Platform\Domain;
use App\Models\Platform\Region;
use App\Models\Platform\Section;

function generalsetting()
{
    $gs=Generalsetting::findOrFail(1);
    
    return $gs;
}

function getSuppliers()
{
    $suppliers = User::where('account_type','=','1')->get();

    return $suppliers;
}

function getRegions()
{
    $region = Region::all();

    return $region;
}

function getSections()
{
    $sections = Section::where('page_type','=','register')->get();

    return $sections;
}

function getCourier()
{
    $courier = Curier::where('is_default',1)->first();

    return $courier;
}

function getDomains()
{
    $domains = Domain::all();

    return $domains;
}
function getLocations()
{
    $locations = Region::all();
    return $locations;
}
function getBrands()
{
    $brands = Brand::all();
    return $brands;
}


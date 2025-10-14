<?php
namespace App\Http\Controllers;

use App\Constants\AppConstants;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventoryPageLoad(Request $request)
    {
       
        $page = $request->input('page', 1);
        $perPage = 10;

        // dummy dataset
        $data = json_decode(file_get_contents(storage_path('app/public/dummy-data/dummy_inventory.json')), true);

        $items = array_slice($data, ($page - 1) * $perPage, $perPage);

        $inventory = new LengthAwarePaginator(
            $items,
            count($data),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        $vendors = AppConstants::VENDORS;
        $categories = AppConstants::CATEGORIES;

        return view('pages.inventory', ['inventory'=>$inventory,'vendors'=>$vendors,'categories'=>$categories]);
    }
}

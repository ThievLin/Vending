<?php

namespace App\Repositories\Dashboard;

use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Reslot;
use Illuminate\Support\Facades\DB;
use phpseclib3\Net\SSH2;



class HomeRepository
{

    public function getResults()
    {
        return DB::table('tab_pro_slot')
            ->join('tab_product_slot', 'tab_pro_slot.slot_num', '=', 'tab_product_slot.slot')
            ->join('tab_product_prices', 'tab_pro_slot.pro_id', '=', 'tab_product_prices.product_id')
            ->select(
                'tab_pro_slot.pro_id',
                'tab_pro_slot.slot_num',
                'tab_product_slot.slot',
                'tab_product_slot.date',
                'tab_product_prices.price_out',
                DB::raw('COUNT(*) as count_same_slot'),
                DB::raw('COUNT(*) * tab_product_prices.price_out AS total_price')
            )
            ->groupBy(
                'tab_pro_slot.slot_num',
                'tab_product_slot.slot',
                'tab_product_slot.date',
                'tab_product_prices.product_id',
                'tab_product_prices.price_out',
                'tab_pro_slot.pro_id'
            )
            ->get();
    }
    public function getResultsPriceIn()
    {
        return DB::table('tab_pro_slot')
            ->join('tab_product_slot', 'tab_pro_slot.slot_num', '=', 'tab_product_slot.slot')
            ->join('tab_product_prices', 'tab_pro_slot.pro_id', '=', 'tab_product_prices.product_id')
            ->select(
                'tab_product_prices.product_id',
                'tab_pro_slot.pro_id',
                'tab_pro_slot.slot_num',
                'tab_product_slot.slot',
                'tab_product_prices.price_in',
                DB::raw('COUNT(*) as count_same_slot'),
                DB::raw('COUNT(*) * tab_product_prices.price_in AS total_price')
            )
            ->groupBy(
                'tab_pro_slot.slot_num',
                'tab_product_slot.slot',
                'tab_product_prices.product_id',
                'tab_product_prices.price_in',
                'tab_pro_slot.pro_id'
            )
            ->get();
    }
    public function getMachin(Machines $query)
    {
        return $query->where('m_name', '!=', 'NULL')->count();
    }
    public function getTransection(Reslot $query)
    {
        $todayDate = Machines::orderBy('created_at', 'desc')->value('created_at');
        return $query->whereNotNull('slot')
            ->whereNotNull('location')
            ->where('date', '>', $todayDate)
            ->count();
    }

    public function getResultApi()
    {
        return DB::table('tab_pro_slot')
            ->select('tab_pro_slot.slot_num', 'tab_pro_slot.pro_id')
            ->join('tab_products', 'tab_pro_slot.pro_id', '=', 'tab_products.id')
            ->join('tab_product_categories', 'tab_products.id_pro_categories', '=', 'tab_product_categories.id')
            ->leftJoin('tab_product_prices', 'tab_products.id', '=', 'tab_product_prices.product_id')
            ->groupBy('tab_products.id', 'tab_pro_slot.pro_id', 'tab_pro_slot.slot_num')
            ->orderBy('tab_pro_slot.slot_num', 'ASC')
            ->get();
    }

}

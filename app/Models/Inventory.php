<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Reslot;
use App\Models\SaleDetail;
use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'tab_pro_slot';

    protected $fillable = [
        'slot_id',
        'slot_num',
        'pro_id',
        'QTY',
        'id_sale_details',
        'date',
        'slot',
        'adddress',
        'location',
        'to_refill',
        'ware_id'

    ];
    // relationship
    public function slots()
    {
        return $this->belongsTo(Slot::class, 'slot_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id', 'id');
    }
    public function saleDetail()
    {
        return $this->belongsTo(SaleDetail::class, 'id_sale_details', 'id');
    }
    public function reslot()
    {
        return $this->belongsTo(Reslot::class, 'slot', 'slot_num');
    }
    // public function warehouse()
    // {
    //     return $this->belongsTo(Warehouse::class, 'ware_id');
    // }

    // fucntion

    public function syncDataFromApi()
    {
        try {
            $response = Http::get('api.bsi-kh.com', ['cache' => 0]);
            if ($response->successful()) {
                $dataslot = $response->json();
                foreach ($dataslot as $slot) {
                    Reslot::updateOrCreate(
                        [
                            'quantity_add' => $slot['id'],
                        ],
                        [
                            'slot' => isset($slot['slot']) ? $slot['slot'] : null,
                            'date' => isset($slot['date']) ? $slot['date'] : null,
                            'address' => isset($slot['address']) ? $slot['address'] : null,
                            'location' => isset($slot['location']) ? $slot['location'] : null,
                        ]
                    );
                }
                return $dataslot; // Return the synchronized data
            } else {
                $statusCode = $response->status();
                $errorMessage = $response->body();
                throw new \Exception($errorMessage, $statusCode);
            }
        } catch (\Exception $e) {
            return [];
        }
    }
    public static function updateInventory($productIds, $refillQuantities, $wareIds, $syncedData)
    {
        foreach ($productIds as $index => $productId) {
            $inventoryItem = Inventory::find($productId);

            $toRefill = isset($refillQuantities[$index]) ? $refillQuantities[$index] : null;
            $wareId = isset($wareIds[$index]) ? $wareIds[$index] : null;

            if ($inventoryItem && $toRefill !== null) {
                $newToRefill = $inventoryItem->to_refill + $toRefill;
                $inventoryItem->to_refill = $newToRefill;
                $inventoryItem->ware_id = $wareId; // Update ware_id
                $inventoryItem->save();
            }
        }
    }
}

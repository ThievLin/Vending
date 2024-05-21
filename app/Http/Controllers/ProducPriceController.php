<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProducPrice;
use App\Repositories\Dashboard\HomeRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpseclib3\Net\SSH2;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProducPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $homeRepository;


    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'price_in' => 'required|array',
            'price_out' => 'required|array',
            'product_id' => 'required|array',
        ]);
        // Get the product data including slot_num
        $productData = $this->homeRepository->getResultApi();

        // Array to store response data
        foreach ($validatedData['product_id'] as $key => $productId) {
            if ($validatedData['price_in'][$key] !== null && $validatedData['price_out'][$key] !== null) {
                // Update or create the product price
                ProducPrice::updateOrCreate(
                    ['product_id' => $productId],
                    [
                        'price_in' => $validatedData['price_in'][$key],
                        'price_out' => $validatedData['price_out'][$key],
                    ]
                );
            }
        }
        // SSH connection to update JSON file
        try {
            // Use the correct host and port
            $ssh = new SSH2('110.74.217.86', 3035);
            
            // Attempt to login with the provided credentials
            if (!$ssh->login('pi', 'raspberry')) {
                throw new Exception('Login Failed');
            }
        
            // Execute the command to read the JSON file
            $jsonOutput = $ssh->exec('cat ~/testcode/product.json');
            $jsonOutput = trim($jsonOutput);
            $jsonData = json_decode($jsonOutput, true);
            
            // Check if JSON decoding was successful
            if ($jsonData === null) {
                throw new Exception('Error decoding JSON data');
            }
            
            // Proceed with your logic using $jsonData
        } catch (Exception $e) {
            // Handle the error and display the message
            return "Error: {$e->getMessage()}. Please make sure you are connected to the internet.";
        }

        // Iterate over the submitted product data
        foreach ($validatedData['product_id'] as $key => $productId) {
            // Check if the price data is not null
            if ($validatedData['price_in'][$key] !== null && $validatedData['price_out'][$key] !== null) {
                // Find the products in the product data based on pro_id
                $products = $productData->where('pro_id', $productId);

                foreach ($products as $product) {
                    // Update the product in JSON data
                    $productIndex = $product->slot_num - 1; // Adjust index to start from 0
                    if (isset($jsonData[$productIndex])) {
                        // Update the price_out
                        $jsonData[$productIndex]['price'] = floatval($validatedData['price_out'][$key]);
                    }
                }
            }
        }
        $updatedJsonData = json_encode($jsonData);
        $ssh->exec('echo \'' . str_replace("'", "\'", $updatedJsonData) . '\' > ~/testcode/product.json');
        $ssh->exec('python3 ~/ssh_config_restart.py &>/dev/null &');
        $ssh->disconnect();

        return redirect('/products')->with('flash_message', 'Product Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function show(ProducPrice $producPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProducPrice $producPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProducPrice $producPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProducPrice $producPrice)
    {
        //
    }
}

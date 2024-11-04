<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Api Product';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $response = Http::withOptions(['verify' => false, 'limit' => 10, ])->get('https://fakestoreapi.com/products');

        // $products = json_decode($response->body());

        $data = $response->body();
        
        //dd($data);  

        Storage::put('products/productsapi.json', $data);

        Log::info('Produtos importados e salvos na pasta products/produtoapi.json.');

    }
}

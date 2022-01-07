<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\product;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire products every 5 minute automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

      $products= Product:: where('expire',1)->get();
      foreach($products as $product)
      {
          $product->delete(['expire'=>1]);
       // $product ->DB::delete('delete products where expire = ?', [1]);

      }
    }
}
/*  "laravel/framework": "^8.65",*/


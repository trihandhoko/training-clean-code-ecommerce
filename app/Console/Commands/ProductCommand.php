<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domains\Products\Services\GetProductService;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:{action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage products using GetProductService';

    /**
     * GetProductService instance.
     *
     * @var GetProductService
     */
    protected $getProductService;

    /**
     * Create a new command instance.
     *
     * @param GetProductService $getProductService
     */
    public function __construct(GetProductService $getProductService)
    {
        parent::__construct();
        $this->getProductService = $getProductService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $action = $this->argument('action');

        switch ($action) {
            case 'get':
                $this->getAllProducts();
                break;

            case 'store':
                $this->storeProduct();
                break;

            case 'find':
                $this->findProduct();
                break;

            default:
                $this->error("Invalid action. Use 'get', 'store', or 'find'.");
                break;
        }

        return Command::SUCCESS;
    }

    /**
     * Display all products.
     */
    private function getAllProducts()
    {
        $products = $this->getProductService->getAllProducts();
        if ($products->isEmpty()) {
            $this->info('No products found.');
        } else {
            $this->table(['ID', 'Name', 'Price', 'Description'], $products->toArray());
        }
    }

    /**
     * Create a new product.
     */
    private function storeProduct()
    {
        $name = $this->ask('Enter product name');
        $price = $this->ask('Enter product price');
        $description = $this->ask('Enter product description (optional)');

        $product = $this->getProductService->createProduct([
            'name' => $name,
            'price' => $price,
            'description' => $description,
        ]);

        $this->info("Product created successfully: ID {$product->id}");
    }

    /**
     * Find a product by ID.
     */
    private function findProduct()
    {
        $id = $this->ask('Enter product ID to find');

        $product = $this->getProductService->getProductById($id);

        if ($product) {
            $this->info("Product Found:\nID: {$product->id}\nName: {$product->name}\nPrice: {$product->price}\nDescription: {$product->description}");
        } else {
            $this->error('Product not found.');
        }
    }
}
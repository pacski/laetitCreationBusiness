<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Repository\Products\ProductRepository;


class stockAvailable implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepository, $request)
    {
        $this->$nbProducts = count($productRepository->list());
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value, $nbProducts, $request)
    {
        for ($i=1; $i <= $nbProducts ; $i++) { 

            $stockTissus = Fabric::where('name', $request->input('tissu-'.$i))->first();
            $product = Product::where('name', $request->input('product-'.$i))->first();
            $quantityProduct = $request->input('quantity-'.$i);

            $stockFabricAfter = $stockTissus->quantity - $product->cost * $quantityProduct ;

            $fabricValidation = false;

            if ($stockFabricAfter < 0)
            {
                $fabricValidation = true;
            }

            if ($fabricValidation == true)
            {
                foreach ($product->stocks as $key => $item) {

                    $materiel = Stock::where('id', $item->pivot->stock_id)->first();
                    $stockMateriel = $materiel->quantity;
                    $quantityMateriel = $item->pivot->quantity * $quantityProduct;
    
                    $stockMaterielAfter = $stockMateriel - $quantityMateriel ;
    
                    $materielValidation = false;
    
                    if ($stockMaterielAfter < 0)
                    {
                        $materielValidation = true;
                        return $materielValidation;
                    }
                }
            }else
            {
                return $fabricValidation ;
            }

        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}

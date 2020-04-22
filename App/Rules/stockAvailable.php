<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Entity\Fabric;
use App\Entity\Stock;
use App\Entity\Product;
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
        $this->nbProducts = count($productRepository->list());
        $this->products = [];
        $this->objProducts = new \stdClass();

        for ($i = 1; $i < $this->nbProducts; $i++) { 
            $details = [];
            $objDetails= new \stdClass();


            $product = Product::where('name', $request->input('product-'.$i))->first();
            $quantityProduct = $request->input('quantity-'.$i);
            $fabric = Fabric::where('name', $request->input('tissu-'.$i))->first();

            // vider les arrays sans produit
           if (!empty($product))
           {
            array_push($details, $product);
           }

           if (!empty($quantityProduct))
           {
            array_push($details, $quantityProduct);
           }
           
           if (!empty($fabric))
           {
            array_push($details, $fabric);
           }
       
            if (empty($details))
            {
                unset($details);
            }else
            {
                $fabricValidation = ($fabric->quantity - $product->cost * $quantityProduct) > 0 ? true : false ;

                $theFabric = [];
                $objFabric = new \stdClass();
                $objFabric->name = $fabric->name;
                $objFabric->validation = $fabricValidation;
                $theFabric = $objFabric;

                $objMateriels = new \stdClass();

                $materiels = [];

                foreach ($product->stocks as $key => $item) 
                {
                    $materiel = Stock::where('id', $item->pivot->stock_id)->first();

                    $materielValidation = ($materiel->quantity - $quantityProduct * $item->pivot->quantity) > 0 ? true : false ;

                    $theMateriels = [];
                    $objtheMateriels = new \stdClass();
                    $objtheMateriels->name = $item->name;
                    $objtheMateriels->validation = $materielValidation;
                    $theMateriels = $objtheMateriels;

                    $materielName = $item->name;

                    array_push($materiels, $theMateriels);

                    $objMateriels->$materielName = $theMateriels;   
                }

                array_push($details, $materiels);

                $materiels = $objMateriels;

                $objDetails->name = $product->name;
                $objDetails->fabric = $theFabric;
                $objDetails->materiels = $materiels ;
                $details = $objDetails;

                $productName = $product->name;
                $this->objProducts->$productName =  $details;
            }
        }
        $this->products = $this->objProducts;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($this->products as $key => $product) 
        {

            if ($product->fabric->validation)
            {
                foreach ($product->materiels as $key => $materiel) {

                    if ($materiel->validation)
                    {
                        return true;
                        break;
                    }
                    else
                    {   
                        $this->message = "Pas assez du materiel : " . $materiel->name . " pour le produit : " . $product->name;
                        return false;
                        break;
                    }
                }
            }
            else
            {
                $this->message = "Pas assez de  tissus : " . $product->fabric->name . " pour le produit : " . $product->name;
                return false;
                break;
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
        return $this->message;         
    }
}

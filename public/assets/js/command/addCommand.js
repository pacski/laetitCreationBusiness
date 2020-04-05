let productList = $(".product-1 *");
let nbProduct = productList.length - 1

for (let i = 1, j = 2, k = 3; i < nbProduct, j < nbProduct + 1, k < nbProduct + 2; i++, j++, k++) {

    $('.product-'+i).change(function(){

        $('#produit-'+j).removeClass('d-none')

        $('.product-'+j).change(function(){
            if ($('.product-'+j).val() == 'product-none-'+j){
                $('#produit-'+j).addClass('d-none')

                if ($('.product-'+k).val() == 'product-none-'+k){
                    $('#produit-'+k).addClass('d-none')
                }
            }
        })
    })
}


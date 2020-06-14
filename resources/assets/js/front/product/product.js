class Product {
    constructor () {
        this.initBinder();
    }

    initBinder() {
        let objectThis = this;
        console.log('load-front-product')

       objectThis.addProduct()
    }
    addProduct(){
        for (let i = 1, j = 2, k = 3; i < 10, j < 10, k < 10; i++, j++, k++) {

            $('.materiel-input-'+i).change(function(){
        
                $('.materiel-bloc-'+j).removeClass('d-none')
        
                $('.materiel-input-'+j).change(function(){
                    if ($('.materiel-input-'+j).val() == 'materiel-none-'+j){
                        $('.materiel-bloc-'+j).addClass('d-none')
        
                        if ($('.materiel-input-'+k).val() == 'materiel-none-'+k){
                        $('.materiel-bloc-'+k).addClass('d-none')
                        }
                    }
                })
            })
        }
    }

}

export { Product }
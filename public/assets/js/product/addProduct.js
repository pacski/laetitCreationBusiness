$('.btn-primary').click(function(){
    $.ajax({
        url: ADD_PRODUCT,
        type: 'POST',
        success: function (){
            console.log('product added !')
        }
    })
})


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
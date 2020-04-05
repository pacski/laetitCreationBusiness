let insta = "https://image.flaticon.com/icons/svg/2111/2111463.svg"
let vinted = "https://1.bp.blogspot.com/-46zpL0xuVws/W5lHHMv8HmI/AAAAAAAAARI/IZI4t8GfwhMRY01tZEZK9bTECW165RlKgCLcBGAs/s1600/vinted.png"
let etsy = "https://image.flaticon.com/icons/svg/825/825513.svg"

let command = $('.table').data('command')

for (let index = 0; index < command.nbCommand; index++) {
    $('.row-command-'+index).click(function(){
        let data = $('.row-command-'+index).data('info')
        $('.number-command').html(data.number)
        $('.fname-lname').html(data.fname + ' ' +data.lname)
        $('.adress').html(data.adresse)
        $('.postalCode-city').html(data.postalCode +' '+ data.city)
        $('.status').html(data.status)

        if (data.origin == "etsy")
        {
            $('.origin-command').attr('src', etsy)
        }else if(data.origin == "instagram")
        {
            $('.origin-command').attr('src', insta)
        } else {
            $('.origin-command').attr('src', vinted)
        }
        let nbArticle = data.nbArticle

        var totalPrice = 0

        for (let index = 0; index < nbArticle; index++) {
        
            if (data.articles[index]){
                totalPrice = totalPrice + data.articles[index].price

                $('.article-'+index).removeClass('d-none')
                $('.product-'+index).html(data.articles[index].name)
                $('.quantity-'+index).html(data.articles[index].quantity)
                $('.price-'+index).html(data.articles[index].price)
                $('.img-'+index).attr('src', 'images/Fabric/'+data.articles[index].fabric.image)
            }
        }
        $('.totalPrice').html(totalPrice+' €')
        $('.totalArticle').html(nbArticle)
    
        $('.details-command-container').removeClass('d-none')
    
    
    
    })
}

$('.exit').click(function(){

    $('.details-command-container').addClass('d-none')

})



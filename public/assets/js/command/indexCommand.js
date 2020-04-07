let insta = "https://image.flaticon.com/icons/svg/2111/2111463.svg"
let vinted = "https://1.bp.blogspot.com/-46zpL0xuVws/W5lHHMv8HmI/AAAAAAAAARI/IZI4t8GfwhMRY01tZEZK9bTECW165RlKgCLcBGAs/s1600/vinted.png"
let etsy = "https://image.flaticon.com/icons/svg/825/825513.svg"

let command = $('.table').data('command')

for (let index = 0; index < command.nbCommand; index++) {
    $('.row-command-'+index).click(function(){
        let data = $('.row-command-'+index).data('info')

        // date
        let date = new Date(data.date)
        let day = date.getDate()

        var month = date.getMonth()
      
        switch (month) {
            case 1:
                var month = "Janvier"
                break;
            case 2:
                var month = "Février"
                break;
            case 3:
                var month = "Mars"
                break;
            case 4:
                var month = "Avril"
                break;
            case 5:
                var month = "Mai"
                break;
            case 6:
                var month = "Juin"
                break;
            case 7:
                var month = "Juillet"
                break;
            case 8:
                var month = "Aout"
                break;
            case 9:
                var month = "Septembre"
                break;
            case 10:
                var month = "Octobre"
                break;
            case 11:
                var month = "Novembre"
                break;
            case 12:
                var month = "Décembre"
                break;
        
            default:
                break;
        }
        let year = date.getFullYear()
    

        // ------------
        $('.number-command').html(data.number)
        $('.date-command').html(day +' '+ month +' '+ year)
        $('.fname-lname').html(data.fname + ' ' +data.lname)
        $('.adress').html(data.adresse)
        $('.postalCode-city').html(data.postalCode +' '+ data.city)

        if (data.status = 1)
        {
            $('.status').html('En attente...')
        }else{
            $('.status').html('Envoyé')
        }
        // $('.status').html(data.status)

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

        $('.article-line').remove()

        for (let index = 0; index < nbArticle; index++) {
        
            if (data.articles[index]){
                totalPrice = totalPrice + data.articles[index].price
                $('.tbody-articles').append('<tr class="article-line"><td><img class="img-'+index+'" width="30" src="" alt=""></td><td>'+data.articles[index].name+'</td><td>'+data.articles[index].quantity+'</td><td>'+data.articles[index].price +'€'+'</td></tr>')
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


console.log('test')
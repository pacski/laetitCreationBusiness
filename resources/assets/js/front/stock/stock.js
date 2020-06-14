class Stock {
    constructor () {
        this.initBinder();
    }

    initBinder() {
        let objectThis = this;
        console.log('load-front-stock')
        objectThis.newType()
    }
    newType(){
        $('.select-type').change(function(){

            if ($('.select-type').val() == "other" )
            {
              $('.input-type').removeClass('d-none')
              $('.select-type').addClass('d-none')
            }
        
          })
    }


}

export { Stock }
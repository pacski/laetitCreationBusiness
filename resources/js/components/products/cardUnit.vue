<template>
  <div>
      <div class="container-product d-flex flex-column">

          <img class="img-product" v-bind:src="'/images/Product/'+this.product.image" alt="">
          <div class="d-flex flex-column">
              <h4 class="text-center">{{this.product.name}}</h4>
              <div class="d-flex justify-content-center">
                <div class="d-flex flex-column logo">
                    <svg class="svg-product" height="30" width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z"/></svg>
                    <p class="text-center">{{this.product.cost}}€</p>
                </div>
                <div class="d-flex flex-column logo">
                    <svg class="svg-product" height="30" width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16.32 7.1A8 8 0 1 1 9 4.06V2h2v2.06c1.46.18 2.8.76 3.9 1.62l1.46-1.46 1.42 1.42-1.46 1.45zM10 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12zM7 0h6v2H7V0zm5.12 8.46l1.42 1.42L10 13.4 8.59 12l3.53-3.54z"/></svg>            
                    <p class="text-center">{{this.product.production_time}}min</p>
                </div>
                <div class="d-flex flex-column logo">
                    <svg class="svg-product" height="30" width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 0H6L0 3v6l4-1v12h12V8l4 1V3l-6-3h-1a3 3 0 0 1-6 0z"/></svg>
                    <p class="text-center">{{this.product.cost}}cm</p>
                </div>
                <div class="d-flex flex-column logo">
                    <svg class="svg-product" height="30" width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                    <p class="text-center">{{this.nbProduct}}</p>
                </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    props: ['product'],
    data(){
        return {
            nbProduct: '',
        }
    },
    mounted(){
        axios.get(`/api/product/countProduct/${this.product.name}`)
        .then(({data})=>{
            this.nbProduct = data
        })
    },

}
</script>

<style>

.img-product{
    height: 300px;
    width: 100%;
    object-fit: cover;
}
.container-product{
    width: 300px;
    height: 500px;
    border: solid;
    margin: 10px;
    border-radius: 5px;
    -webkit-box-shadow: -2px 12px 26px 5px rgba(0,0,0,0.75);
    -moz-box-shadow: -2px 12px 26px 5px rgba(0,0,0,0.75);
    box-shadow: -2px 12px 26px 5px rgba(0,0,0,0.75);
}

.svg-product{
    margin: auto;
}

.logo{
    margin: 10px;

}
.product-count{
    text-align:center;
    background-color: #efc6cc;
    z-index:1;
}

</style>
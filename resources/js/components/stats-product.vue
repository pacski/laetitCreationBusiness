<template>
  <div class="container-stats rounded d-flex flex-column pt-2 pb-2">
    <div v-if="loaded">
        <canvas class="mx-auto" id="productChart"></canvas>
    </div>
    <div v-if="loaded" class="input-group mb-3 w-50 mx-auto">
        <div  class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Produit</label>
        </div>
        <select v-model="selectedProduct"  class="custom-select" id="inputGroupSelect01">
            <option :value="item.name" :key="item.id" v-for="item in products">{{item.name}}</option>
        </select>
    </div>
    <div class="mx-auto">
        <b-spinner variant="info" v-if="!loaded" class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>

<script>
export default {
    data (){
        return {
            products: [],
            statsProduct: [],
            selectedProduct: 'produit1',
            url: '/stats/product/DYN_PRODUCT',
            title: 'Vente de DYN_PRODUCT en 2020',
            label: 'quantité vendu',
            loaded: false
        }
    },
    mounted(){
        axios.get('/listingProduct')
        .then(({data}) =>{
            this.products = data
            console.log('list product')
            console.log(data)
        })

        axios.get(this.url.replace('DYN_PRODUCT', this.selectedProduct) ,this.dataProduct)
        .then(({data}) =>{
            console.log('stats product')
            console.log(data)
            this.statsProduct = data
            this.loaded = true
        })
        .then(()=>{
            this.loadChart(this.selectedProduct, this.statsProduct)
        })
    },
    updated(){
        axios.get(this.url.replace('DYN_PRODUCT', this.selectedProduct) ,this.dataProduct)
        .then(({data}) =>{
            this.statsProduct = data
            this.loadChart(this.selectedProduct, data)
        })
    },
    methods: {
        loadChart (selectedProduct, data){
        var ctx = document.getElementById('productChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                datasets: [{
                    label: this.label.replace('DYN_PRODUCT', selectedProduct),
                    // backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data
                }]
            },

            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: this.title.replace('DYN_PRODUCT', selectedProduct)
                }
            }
        });
        }
    }
}
</script>

<style>

</style>
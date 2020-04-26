<template>
  <div class="container-stats rounded d-flex flex-column pt-2 pb-2 h-50">
      <div class="stats">
        <product-year :styles="myStyles" v-if="loaded" :options="options" :chart-data="datacollection" ></product-year>
      </div>
    <div v-if="loaded" class="input-group mb-3 w-50 mx-auto">
        <div  class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Produit</label>
        </div>
        <select @change="fillData()" v-model="selectedProduct"  class="custom-select" id="inputGroupSelect01">
            <option :value="item.name" :key="item.id" v-for="item in products">{{item.name}}</option>
        </select>
    </div>
    <div class="mx-auto">
        <b-spinner variant="info" v-if="!loaded" class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>

<script>
import productYear from './charts/productYear'
export default {
    components:{productYear},
    data (){
        return {
            products: [],
            statsProduct: [],
            selectedProduct: 'produit1',
            url: '/stats/product/DYN_PRODUCT',
            title: 'Vente de DYN_PRODUCT en 2020',
            label: 'quantité vendu',
            loaded: false,
            options:{},
            datacollection: null,
            height: 100,
        }
    },
    mounted(){
        
        this.getProducts()
        this.fillData()
    },
    computed: {
        myStyles(){
            return {
                // height: '200px',
                // width: '100%',
                // // position: 'block',
                // display: 'block'
            }
        }
    },
    methods: {
        fillData(){
            
            axios.get(this.url.replace('DYN_PRODUCT', this.selectedProduct))
            .then(({data})=> {
            this.datacollection = {
                labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                datasets: [
                    {
                        label: this.label.replace('DYN_PRODUCT', this.selectedProduct),
                        // backgroundColor: ['rgb(101, 169, 183)', 'rgb(208, 60, 156)', 'rgb(251, 179, 141)'],
                        data: data
                    },
                ]
            }
            this.loaded = true;

            })
        },
        getProducts(){
            axios.get('/listingProduct')
            .then(({data}) =>{
                this.products = data
            })
        }
    }
}
</script>

<style>

</style>
<template>
    <b-card
        :title="this.stock.name"
        :img-src="'images/Stock/'+this.stock.image"
        :img-width="250"
        :img-height="250"
        img-alt="Image"
        img-top
        tag="article"
        style="max-width: 20rem; height:20%"
        class="mb-2 m-3 text-center"
    >
        <b-tabs content-class="mt-3" align="center">
            <b-tab title="Informations" active>
                <p>Type :<span> {{this.stock.type}}</span></p>
                <p>Dépense :<span> {{this.totalExpense}} €</span></p>
            </b-tab>
            <b-tab title="Ajouter"> 
                <b-form-input :name="'price'" v-model="price" placeholder="Prix" type="number"></b-form-input>
                <b-form-input class="mt-2" :name="'quantityAdd'" v-model="quantityAdd" placeholder="Quantité" type="number"></b-form-input>
                <b-button @click="addStock" class="mb-2 mt-2" type="submit" variant="primary">Valider</b-button>
            </b-tab>
        </b-tabs>
        <br>

        <b-progress :max="maxQuantity" :variant="progressBar(currentQuantity, maxQuantity)" show-progress animated>
            <b-progress-bar :value="currentQuantity" :label="`${currentQuantity} / ${maxQuantity}`"></b-progress-bar>
        </b-progress>
    </b-card>
</template>

<script>
export default {
    props:['stock', 'selected', 'types'],

    data(){
        return {
            currentQuantity: this.stock.quantity,
            maxQuantity: this.stock.quantity_buyed,
            quantityAdd: '',
            price:'',
            totalExpense: this.stock.total_expense,
            checkBox: []
        }
    },
    mounted(){
    },
    methods:{
        progressBar(quantity, max){
            let level = quantity / max * 100
            if (level > 75)
            {
                return 'success';
            }else if (level > 25)
            {
                return 'warning';
            }else{
                return 'danger'
            }
        },
        addStock(){
            axios.post('/api/stock/addStock', {
                quantityAdd: this.quantityAdd,
                name: this.stock.name,
                price: this.price
            })
            .then(()=>{
                this.currentQuantity = this.currentQuantity + parseInt(this.quantityAdd)
                this.maxQuantity = this.maxQuantity + parseInt(this.quantityAdd)
                this.totalExpense = this.totalExpense + parseInt(this.price)
            })
        },
    },
}
</script>

<style>

</style>
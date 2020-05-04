<template>
  <div class="d-flex flex-wrap justify-content-center">
    <card-unit :product="item" :key="item.id" v-for="item in data"></card-unit>
  </div>
</template>

<script>
import cardUnit from './cardUnit'

export default {
    components: {cardUnit},
    data(){
        return{
            data: [],

        }
    },
    mounted(){

        axios.get('/api/product')
        .then(({data})=>{
            this.data = data
            console.log('data product')
            console.log(data)
        })
    }

}
</script>

<style>

</style>
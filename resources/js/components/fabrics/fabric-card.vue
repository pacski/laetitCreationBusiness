<template>
  <div>
    <div class="d-flex flex-wrap justify-content-center">
        <cardUnit 
        :fabric='item'
        :key="item.id" 
        v-for="(item, index) in data"
        v-on:deleteFabric="deleteFabric($event, index)"
        >
        </cardUnit>
    </div>
  </div>
</template>

<script>
import cardUnit from './cardUnit'

export default {
    components: {cardUnit},
    data(){
        return{
            data: []

        }
    },
    mounted(){
        axios.get('/api/fabric/')
        .then(({data})=>{
            this.data = data
        })
    },
    methods:{
        deleteFabric(fabric, index){
            axios.post(`/api/fabric/delete/${fabric}`)
            .then(()=>{
                this.data.splice(index, 1);
            })

        }
    }

}
</script>

<style>

</style>
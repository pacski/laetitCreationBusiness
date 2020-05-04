<template>
  <b-card
    v-if="notDeleted"
    :title="this.fabric.name"
    :img-src="'images/Fabric/'+this.fabric.image"
    img-width="200px"
    img-height="200px"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 20rem; height:20%"
    class="mb-2 m-3 text-center card-fabric"
  >
    <b-progress :max="maxQuantity" :variant="progressBar(currentQuantity, maxQuantity)" show-progress animated>
        <b-progress-bar :value="currentQuantity" :label="`${currentQuantity} / ${maxQuantity}`"></b-progress-bar>
    </b-progress>
    <template v-slot:footer>
        <b-button v-on:click="deleteFabric" class="btn-delete" >
            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
        </b-button>
    </template>
  </b-card>
  
</template>

<script>
export default {
    props:['fabric'],
    data(){
        return {
            currentQuantity: this.fabric.quantity,
            maxQuantity: this.fabric.quantity_buyed,
            notDeleted: true,
        }
    },
    mounted(){
        axios.get('/api/fabric/')
        .then(({data})=>{
            console.log(data)
            this.data = data
        })
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
        deleteFabric: function () {
            if(confirm(`Confirmation de suppression de ${this.fabric.name}`))
            {
                this.$emit('deleteFabric', this.fabric.id);
            }
        }
    },
}
</script>

<style>
.card-fabric{
    width: 250px
}

.btn-delete{
    padding-top:2px;
}
</style>
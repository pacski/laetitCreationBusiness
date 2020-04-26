<template>
  <div  class="little-container rounded d-flex flex-column pt-2 pb-2">
        <div  class="mx-auto">
            <h2 class="text-center">{{number}} <span>{{unit}}</span></h2>
            <p class="text-center font-weight-lighter">{{title}}</p>
        </div>
        <div v-if="!loaded" class="mx-auto">
            <b-spinner variant="info"  class="m-5" label="Busy"></b-spinner>
        </div>
  </div>
</template>

<script>
export default {

    props: ['keyFigure'],
    data(){
        return{
            loaded: false,
            title: this.keyFigure[0][0],
            number: this.keyFigure[0][1],
            unit: this.keyFigure[0][2]
        }
    },
    beforeMount(){
        this.loaded = false
    },
    mounted(){
        this.loaded = true

    }
}
</script>

<style>

</style>
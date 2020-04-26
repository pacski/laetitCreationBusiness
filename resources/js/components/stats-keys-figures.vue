<template>
<div class="d-flex justify-content-center"> 
    <stats-key-figure :keyFigure="keyFigure" :key="keyFigure[0][0]" v-for="keyFigure in data" ></stats-key-figure>
  </div>
</template>

<script>
import statsKeyFigure from './stats-key-figure'

export default {
    components: {statsKeyFigure},
    data(){
        return{
            data: {},
            loaded: false

        }
    },
    mounted(){
        axios.get('/stats/keysFigures')
        .then(({data})=> {
            console.log('keyfigures')
            console.log(data.chiffre_daffaire[0])
            this.data = data
            this.loaded = true
        })
    }
}
</script>

<style>

</style>
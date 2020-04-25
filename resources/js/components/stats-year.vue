<template>
  <div class="container-stats rounded d-flex flex-column pt-2 pb-2">
    <div v-if="loaded">
        <canvas class="mx-auto" id="statsYear"></canvas>
    </div>
    <div class="mx-auto">
        <b-spinner variant="info" v-if="!loaded" class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>

<script>
import Chart from 'chart.js';


export default {
    data(){
        return{
            statsYear: [],
            loaded: false
        }

    },
    
    mounted(){
        axios.get('/stats/year')
        .then(({data}) =>{
            console.log('stats year')
            console.log(data)
            this.statsYear = data
            this.loaded = true
        })
        .then(()=>{
            var ctx = document.getElementById('statsYear').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                    datasets: [{
                        label: 'My First dataset',
                        // backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: this.statsYear
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: "Nombre de commande en 2020"
                    }
                }
            });
        })
        




    }

}


</script>

<style>

</style>
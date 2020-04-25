<template>
  <div>
      <canvas class="w-50 h-50 mx-auto" id="myChart"></canvas>
  </div>
</template>

<script>
import Chart from 'chart.js';


export default {
    data(){
        return{
            statsYear: []
        }

    },
    
    mounted(){
        axios.get('/stats/year',this.data)
        .then(({data}) =>{
            console.log(data)
            this.statsYear = data
        


        var ctx = document.getElementById('myChart').getContext('2d');
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
            options: {}
        });
        })
    }

}


</script>

<style>

</style>
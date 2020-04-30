
<template>
  <div class="container-stats rounded d-flex flex-column pt-2 pb-2">
    <div v-if="loaded">
        <canvas  class="mx-auto" id="bestProductChart"></canvas>
    </div>
    <div class="mx-auto">
        <b-spinner variant="info" v-if="!loaded" class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            data: [],
            loaded: false

        }
    },
    mounted (){ 

            axios.get('/stats/bestProduct')
            .then(({data})=> {
                console.log('stats bestProduct')
                console.log(data)
                this.data = data
                this.loaded = true
            })
            .then(() => {
                this.loadChart()
            })
            
    },
    methods: {
        loadChart(){
            console.log('chart best prod')
            console.log(this.data)
            var ctx = document.getElementById('bestProductChart');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: this.data.productName ,
                    datasets: [{
                        backgroundColor: this.data.color,
                        data: this.data.total_sales
                    }]
                },
                options: { 
                    title: {
                        display: true,
                        text: "Meilleurs produits"
                    },
                    legend:{
                        display: true,
                        position: 'right',
                    }

                }
            });
        }
    }

}
</script>

<style>

</style>
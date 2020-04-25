<template>
  <div class="container-stats rounded d-flex flex-column pt-2 pb-2">
    <div v-if="loaded">
        <canvas  class="mx-auto" id="originChart"></canvas>
    </div>
    <div class="mx-auto">
        <b-spinner variant="info" v-if="!loaded" class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>

<script>

export default {
    data (){
        return{
            data: {},
            label: 'Origine de la vente',
            loaded: false
        }
    },
    mounted (){ 

            axios.get('/stats/origin')
            .then(({data})=> {
                console.log('stats origin')
                console.log(data)
                this.data = data
                this.loaded = true
            })
            .then(() => {
                this.loadChart()
            })
            
    },
    computed: {

    },
    methods: {
        loadChart(){
            console.log('obs')
            console.log(this.data)
            var ctx = document.getElementById('originChart');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['vinted', 'instagram', 'etsy'] ,
                    datasets: [{
                        backgroundColor: ['rgb(101, 169, 183)', 'rgb(208, 60, 156)', 'rgb(251, 179, 141)'],
                        data: [this.data.vinted, this.data.instagram, this.data.etsy]
                    }]
                },
                options: { 
                    title: {
                        display: true,
                        text: "Origine des ventes"
                    },
                    legend:{
                        display: false
                    }

                }
            });
        }
    }
}
</script>

<style>

</style>
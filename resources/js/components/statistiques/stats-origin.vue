<template>
  <div class="container-stats rounded d-flex flex-column pt-2 pb-2">
    <origin v-if="loaded" class="w-50 mx-auto mb-3" :options="options" :chart-data="datacollection"></origin>
    <select v-if="loaded" class="w-50 mx-auto" @change="fillData()"  v-model="selectedMonth" name="" id="">
        <option :key="month.key" v-for="month in months" :value="month.key" selected>{{month.name}}</option>
    </select>
    <div v-if="!loaded" class="mx-auto">
        <b-spinner variant="info"  class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>

<script>
import origin from './charts/origin'

export default {
    components:{origin},
    data (){
        return {
            months: {},
            url: '/stats/origin/DYN_MONTH',
            date: new Date (),
            selectedMonth: '',
            loaded: false,
            datacollection: null,
            options: {    
                title: {
                    display: true,
                    text: 'Origine des ventes du mois'
            }}
        }
    },
    mounted (){        
        this.selectedMonth = this.date.getMonth() + 1
        this.getMonths()
        this.fillData()
    },
    methods: {

        fillData(){         
            axios.get(this.url.replace('DYN_MONTH', this.selectedMonth))
            .then(({data})=> {
            this.datacollection = {
                labels: ['vinted', 'insta', 'etsy'],
                datasets: [
                    {
                        label: 'Vente',
                        backgroundColor: ['rgb(101, 169, 183)', 'rgb(208, 60, 156)', 'rgb(251, 179, 141)'],
                        data: [data.vinted, data.instagram, data.etsy]
                    },
                ]
            }
            this.loaded = true;

            })
        },
        getMonths(){
            axios.get('/stats/service/months')
            .then(({data})=>{
                this.months = data
            })
        }
    }
}
</script>

<style>
#line-chart{
    height: 100px
}
</style>
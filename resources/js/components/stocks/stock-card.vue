<template>
  <div>
        <div class="d-flex">
            <b-form-radio-group
                class="button-filter"
                id="btn-radios-1"
                size="lg"
                v-model="selected"
                :options="options"
                buttons
                button-variant="secondary"
                name="radios-btn-default"
            ></b-form-radio-group>
        </div>


    <div class="d-flex flex-wrap justify-content-center">
        <cardUnit :types="options" :selected='selected' :stock='item' :key="item.id" v-for="item in filterStock"></cardUnit>
    </div>
  </div>
</template>

<script>
import cardUnit from './cardUnit'

export default {
    components: {cardUnit},

    data(){
        return {
            data:[],
            selected: [],
            options: [],
        }
    },
    computed:{
        filterStock: function (){
            return this.data.filter((item)=>{
                return item.type.match(this.selected)
            })
        }
    },
    mounted(){
        axios.get('/api/stock')
        .then(({data})=>{
            this.data = data
        })

        axios.get('/api/stock/getAllType')
        .then(({data})=>{
            console.log(data)
            this.options = data
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
    },
}
</script>

<style>
.filter{
    display: flex;
    justify-content: center;
}
.button-filter{
    margin: auto;
    text-align: center;
}

</style>
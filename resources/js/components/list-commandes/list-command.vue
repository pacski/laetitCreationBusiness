<template>
  <div>

        <b-col style="margin: auto" lg="6"  class="my-1">
            <b-input-group size="sm">
              <b-form-input
                v-model="filter"
                type="search"
                id="filterInput"
                placeholder="Rechercher..."
              ></b-form-input>
              <b-input-group-append>
                <b-button :disabled="!filter" @click="filter = ''">Réinitialiser</b-button>
              </b-input-group-append>
            </b-input-group>
        </b-col>
        <br>
        <b-table 

          :filter="filter"
          :filterIncludedFields="filterOn"
          @filtered="onFiltered"

          striped
          :items="commands"
          :fields="fields"
          :per-page="perPage"
          :current-page="currentPage"
          :sort-by.sync="sortBy"
          :sort-desc.sync="sortDesc"
          :tbody-tr-class="rowClass"
          :responsive="true"
          :hover="true"
        >
          <template v-slot:cell(origin)="data">
                <b class="text-info" v-if="data.item.origin == 'instagram'">
                  <img width="40" src="https://image.flaticon.com/icons/svg/2111/2111463.svg" alt="" srcset="">
                </b>
                <b class="text-info" v-else-if="data.item.origin == 'vinted'">
                  <img width="40" src="https://1.bp.blogspot.com/-46zpL0xuVws/W5lHHMv8HmI/AAAAAAAAARI/IZI4t8GfwhMRY01tZEZK9bTECW165RlKgCLcBGAs/s1600/vinted.png" alt="" srcset="">
                </b>
                <b class="text-info" v-else-if="data.item.origin == 'etsy'">
                  <img width="40" src="https://image.flaticon.com/icons/svg/825/825513.svg" alt="" srcset="">
                </b>
          </template>

          <template v-slot:cell(duration)="data">
              <p :class="durationColor(data)"  v-text="duration(data)"></p>
          </template>
          <template v-slot:cell(created_at)='data'>
              <p v-text="formatDate(data)"></p>
          </template>
          <template v-slot:cell(details)='row'>
              <b-button size="sm " @click="row.toggleDetails" class="mr-2">Détails</b-button>
          </template>

          <template v-slot:row-details="row">
            <detailsCommand :row="row"></detailsCommand>
          </template>

        </b-table>
        <b-pagination
          v-model="currentPage"
          :total-rows="rows"
          :per-page="perPage"
          aria-controls="my-table"
        ></b-pagination>

  </div>
</template>

<script>
import { getSeconds, format, formatDistance, formatRelative, differenceInCalendarDays  } from 'date-fns'
import { fr } from 'date-fns/locale'
import detailsCommand from './detailsCommand'

export default {
  components:{
    detailsCommand
  },
    data() {
      return {
        // Note `isActive` is left out and will not appear in the rendered table
        fields: [
              {key:'number', label:'numéro de commande',sortable: true},
              {key:'origin', label:'origine de vente',sortable: true},
              {key:'lname', label:'Nom',},
              // {key:'fname', label:'Prénom'},
              // {key:'postalCode', label:'Code postal',sortable: true},
              // {key:'status', label:'Status',sortable: true},
              {key:'duration', label: 'Durée',sortable: false},
              {key:'created_at', label: 'Date de vente',sortable: true},
              {key:'details', label: 'Details'},
        ],
        items: [],
        commands:[],
        perPage: 10,
        currentPage: 1,
        sortBy: 'status',
        selected: [],
        filter: null,
        filterOn: [],
        sortDesc: false,
        responsive: true,
        now: new Date(),        
      }
    },
    mounted(){
      axios.get('/api/command')
      .then(({data})=> {
        this.items = [{}],
        this.commands = data          
        console.log(this.items)
        console.log(this.commands)
        console.log(data[0])
      })
    },
    computed:{
      rows() {
        return this.commands.length
      },
    },
    methods: {
      duration(data){
        return formatDistance(new Date(data.item.created_at), this.now, {locale: fr})
      },
      formatDate(data){
        return format(new Date(data.item.created_at), 'd LLLL u',{locale:fr} )
      },
      rowClass(item, type) {
        if (!item || type !== 'row') return
        if (item.status === 1){
         return 'table-warning'
        }else if (item.status === 2)
        {
          return 'table-info'
        }else if (item.status === 3)
        {
          return 'table-success'
        }
      },
      durationColor(data){
        if(differenceInCalendarDays(new Date(data.item.created_at), new Date()) < -5 &&  data.item.status === 1){
          return 'text-danger'
        }else if (differenceInCalendarDays(new Date(data.item.created_at), new Date()) < -2 &&  data.item.status === 1){
          return 'text-info'
        }else if (differenceInCalendarDays(new Date(data.item.created_at), new Date()) >= -2 &&  data.item.status === 1){
          return 'text-success'
        }
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      }
    },

}
</script>

<style>
p{
  font-size: 16px
}
</style>
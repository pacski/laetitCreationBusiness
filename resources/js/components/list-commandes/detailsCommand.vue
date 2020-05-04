<template>
            <b-card>
            <div class="d-flex justify-content-end">
              <b-button size="sm" @click="row.toggleDetails">X</b-button>
            </div>
            <b-tabs content-class="mt-3" >
              <b-tab title="Informations" active>
                <b-row class="mb-2">
                  <b-col sm="3" class="text-sm-right"><b>Numéro de commande:</b></b-col>
                  <b-col>{{ row.item.number }}</b-col>
                </b-row>

                <b-row class="mb-2">
                  <b-col sm="3" class="text-sm-right"><b>Nom / Prénom:</b></b-col>
                  <b-col>{{ row.item.lname }} {{row.item.fname }}</b-col>
                </b-row>
                <b-row class="mb-2">
                  <b-col sm="3" class="text-sm-right"><b>Adress:</b></b-col>
                  <b-col>{{ row.item.adress }} {{row.item.postalCode }} {{row.item.city}}</b-col>
                </b-row>
                <b-row class="mb-2">
                  <b-col sm="3" class="text-sm-right"><b>Date:</b></b-col>
                  <b-col>{{ formatDate(row.item.created_at)}}</b-col>
                </b-row>
                <b-row class="mb-2">
                  <b-col sm="3" class="text-sm-right"><b>Statut:</b></b-col>
                  <b-col v-if="this.status == 1"><p>En attente</p></b-col>
                  <b-col v-else-if="this.status == 2"><p>Réalisée</p></b-col>
                  <b-col v-else-if="this.status == 3"><p>Envoyée</p></b-col>
                </b-row>
              </b-tab>
              <b-tab title="Panier">
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tissu</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                  </tr>
                </thead>
                <tbody class="tbody-articles">
                  <tr :key="item.id" v-for="item in row.item.articles">
                    <td><img width="75" height="75" :src="'images/Fabric/'+item.fabricImage" alt="" srcset=""></td>
                    <td><img width="75" height="75" :src="'images/product/'+item.image" alt="" srcset=""></td>
                    <td>{{item.quantity}}</td>
                    <td>{{item.price}}</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td>Articles : </td>
                    <td>{{totalArticles(row.item.articles)}}</td>
                    <td>Total : </td>
                    <td>{{totalPrice(row.item.articles)}} €</td>
                  </tr>
                </tfoot>
                </table>  
              </b-tab>
            </b-tabs>
  
            <div class="col-md-6">
              <b-form-select :name="'status'"  @change=" makeToast(true, row.item), changeStatus(row.item)" v-model="status" :options="options"></b-form-select>
            </div>
            </b-card>
</template>


<script>
import { format } from 'date-fns'
import { fr } from 'date-fns/locale'

export default {
  props: ['row'],
  data(){
    return {
        status:null,
        options: [
          {value: null, text: 'Définir le statut'},
          {value: '1', text: 'En attente'},
          {value: '2', text: 'Réalisée'},
          {value: '3', text: 'Envoyée'},
        ],
        status: '',
    }
  },
  mounted(){
    this.status = this.row.item.status
  },
  methods: {
      formatDate(date){
        return format(new Date(date), 'd LLLL u',{locale:fr} )
      },
      getStatus(status){
        if(status == 1){
          return 'En attente'
        }else if(status == 2){
          return 'Réalisée'
        }else if(status == 3){
          return 'Envoyée'
        }
      },
      totalPrice(articles){
        let total = 0
        articles.forEach(element => {
          total = total + element.quantity * element.price
        });
        return total
      },
      totalArticles(articles){
        let total = 0 
        articles.forEach(element => {
          total = total + element.quantity
        });
        return total
      },
      changeStatus(data){
        console.log(data)
        axios.post('/api/command/'+data.number+'/'+this.status, 'status' )
        .then(({data})=> {
          console.log('change')
          console.log(this.status)
        })
        // this.status = this.status
      },
      makeToast(append = false, command) {
        this.$bvToast.toast(`la commande ${command.number} est ${this.getStatus(this.status)}`, {
          title: 'Changement de statut',
          autoHideDelay: 5000,
          appendToast: append
        })
      },
  }
}
</script>

<style>

</style>
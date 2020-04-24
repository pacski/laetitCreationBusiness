<template>
  <div>
      <h4>listes des users</h4>
        <p>timer : {{now}}</p>
      <div>
          <div v-for="user in users" :key="user.name">
            <p>name : <span v-text="user.name"></span></p>
            <p>email : <span v-text="user.email"></span></p> 
            <p>password: <span v-text="user.password"></span></p>
            <p>created_at: il y a <span v-text="format(user.created_at)"></span></p>
            <hr>
          </div>
    
      </div>
      <form action="" @submit.prevent="submitComment">
          
          <input v-model="form.name" type="text" name="name" id="" placeholder="name">
          <p class="text-danger" v-if="errors.name" v-text="errors.name[0]"></p>
          <input  v-model="form.email" type="email" name="email" id="" placeholder="email">
          <p class="text-danger" v-if="errors.email" v-text="errors.email[0]"></p>
          <input  v-model="form.password" type="password" name="password" id="" placeholder="password">
          <p class="text-danger" v-if="errors.password" v-text="errors.password[0]"></p>
          <input  type="submit" value="Valider">
      </form>
  </div>
</template>

<script>
import { getSeconds, format, formatDistance, formatRelative  } from 'date-fns'
import { fr } from 'date-fns/locale'


export default {
    // props: ['dataUsers'],
    data (){
        return{
            form: {
                name:'',
                email:'',
                password:'',
            },
            users: this.dataUsers,
            errors: {},
            style: {
                background: '',
            },
            color: "",
            now: new Date()

            
        }
    },
    mounted(){
        axios.get('/user/index', this.form)
        .then(({data})=>{
                this.users = data
                console.log(data)
        })

        setInterval((now)=> {
            var test = new Date()
            // this.now = formatRelative(new Date(this.now), new Date(), {locale: fr})
            this.now = getSeconds(test) //formatRelative(new Date(this.now), new Date(), {locale: fr})
   
        }, 1000)
    },
    methods: {
        submitComment(){
            axios.post('/user/create', this.form)
                
            .then(({data})=>{
                this.users.push(data)
                this.form.name = "",
                this.form.email = "",
                this.form.password = ""
                this.errors = {}

            })
            .catch(error => {
                this.errors = error.response.data.errors
            })
        },
        format(date){
            return formatDistance(new Date(date), this.now, {locale: fr})
        }

    }
}
</script>

<style>

</style>
<template>
    <div>
        <p> composant de {{name}}</p>
        <input type="text" v-model="name" class="text">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                name: 'remy'
            }
        }
    }
</script>

<template>
    <div>
        <h1>composant stats</h1>

        <div class="input-group mb-3">
        <input :type="show ? 'password' : 'text'" class="border rounded-1 px-2 h-8">
        <button @click="show = !show" class="border-r borer-t border-b rounded-r 2px h-8 flex -justify-center items-center">
            <svg v-show="show" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 fill-current text-grey-darker" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
            <svg v-show="!show" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.81 4.36l-1.77 1.78a4 4 0 0 0-4.9 4.9l-2.76 2.75C2.06 12.79.96 11.49.2 10a11 11 0 0 1 12.6-5.64zm3.8 1.85c1.33 1 2.43 2.3 3.2 3.79a11 11 0 0 1-12.62 5.64l1.77-1.78a4 4 0 0 0 4.9-4.9l2.76-2.75zm-.25-3.99l1.42 1.42L3.64 17.78l-1.42-1.42L16.36 2.22z"/></svg>
        </button>
        </div>

    </div>
</template>

<script>
export default {
    
    data(){
        return{
            show: true
        }
    }
}
</script>
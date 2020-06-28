<template>
<form>
    <div class="form-group">
        <alertSuccess v-if="alert"></alertSuccess>
        <validationErr :errors="validationErrors" v-if="validationErrors"></validationErr>
        <label for="numbergroup">Выберите номер класса</label>
        <input id="numbergroup" type="number" v-model="numbergroup" value="" placeholder="Выбрать класс" class="form-control" required>
        <label for="litera">Выберите букву класса(а-в)</label>
        <input id="litera" type="text" v-model="litera" value="А" class="form-control">
        <button type="button" @click="createclass()" class="btn btn-success">Создать класс</button>
    </div>
</form>
</template>
<script>
import axios from 'axios'
export default {
    data(){
        return {
            numbergroup: '',
            litera: '',
            validationErrors: '',
            alert: ''
          };
    },   
    methods: {
        createclass() {
            var request = {
            numbergroup: this.numbergroup,
            litera: this.litera,
            group: this.numbergroup + this.litera          
        };  
            this.validationErrors = 0             
            axios.post('/api/addclass', request)
                .then(response => {
                    this.alert = 1;
                })
                .catch((error)=> {
                    if(error.response.status == 422)
                    {
                        this.validationErrors = error.response.data.errors
                    }
                })
        }
    }
}
</script>
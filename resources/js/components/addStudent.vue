<template>
<div>
<form >
    <validationErr :errors="validationErrors" v-if="validationErrors"></validationErr>
    <div class="form-group">
        <label for="firstName">Имя</label>
        <input id="firstName" type="text" v-model="firstname" value="" placeholder="Введите имя" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastName">Фамилия</label>
        <input id="lastName" type="text" v-model="lastname" value="" placeholder="Введите фамилию" class="form-control">
    </div>
    <div class="form-group">
        <label for="sName">Отчество</label>
        <input id="sName" type="text" v-model="sname" value="" placeholder="Пол" class="form-control">
    </div>
    <div class="form-group">
        <label for="gender">Пол</label>
        <select v-model="gender" size="2" >
            <option selected value="Мужской">Мужской</option>
            <option selected value="Женский">Женский</option>
        </select>
    </div>
    <div class="form-group">
        <select v-model="groupcreate" id="groupcreate" size="3">
            <option v-for="{ group } in groups">{{ group }}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="birth-date">Дата рождения</label>
        <input id="birth-date" type="text" v-model="birthdate" value="" placeholder="дд.мм.гггг" class="form-control">
    </div>
    <button type="button" @click="createstudent()" class="btn btn-success">Создать студента</button>
</form>
</div>
</template>


<script>
import axios from 'axios';
export default {
    data: function(){
        return {
            firstname: '',
            lastname: '',
            sname: '',
            gender: '',
            birthdate: '',
            groupcreate: '',
            validationErrors: '',
            groups: null,
          };
    },
    created()
    {
        this.fetchData();
    },   
    methods: {
        fetchData() {
            this.error = this.groups = null;
            this.loading = true;   
            axios
                .get('/api/groups')
                .then(response => { this.groups = response.data } );
        },
         

        createstudent() {
            var request = {
            firstname: this.firstname,
            lastname: this.lastname,
            sname: this.sname,
            gender: this.gender,
            birthdate: this.birthdate,
            groupcreate: this.groupcreate,
            validationErrors: ''
        };
            axios.post('/api/addstudent', request)
                .then(response => {
                    console.log(response);
                })
                .catch((error)=> {
                    if(error.response.status == 422)
                    {
                        this.validationErrors = error.response.data.errors;
                    }
                }) 
        }
    }
}
</script>
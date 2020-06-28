<template>
<div>
    <nav class="nav nav-masthead justify-content-center">
            <router-link class="nav-link active" :to="{ name: 'show.students' }">Показать студентов</router-link>   
            <router-link class="nav-link active" :to="{ name: 'add.student' }">Добавить студента</router-link>     
            <router-link class="nav-link active" :to="{ name: 'add.group' }">Добавить класс</router-link>            
    </nav>
    <div class="container" >
        <router-view></router-view> 
    </div>
</div>  
</template>
<script>
    export default {}
</script>
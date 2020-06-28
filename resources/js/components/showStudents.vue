<template>
  <div>
    <div class="form-group">
      <select v-model="groupfind" id="groupfind" size="3">
            <option value="1">Показать все</option>
            <option v-for="{ group } in groups">{{ group }}</option>  
      </select>
    </div>
    <div class="alert alert-info info" v-for="{ firstname, lastname, birthdate, gender, sname } in sortedlist">
       <div>
       {{ lastname }}
       {{ firstname }}      
       {{ sname }}
       </div>
       <p> Пол: {{ gender }} 
        Дата рождения: {{ birthdate }}
      </p>     
    </div>
  </div>
</template>

<script>
import axios from 'axios';
    export default {
        data: function(){
            return{
                loading: false,
                students: null,
                error: null,
                groupfind: 1,
                students: [],
                groups: [],
                text:''
            };
        },
        created(){
          this.fetchData();
          this.loading = false;
        },
 
    
        computed:{
            sortedlist(){
              if(!this.students){return 0;}
              if(this.groupfind == 1) return this.students
              var l = 0;
              this.groups.forEach(el => {
                  if(this.groupfind === el.group)
                      l = el.id
              })
              return this.students.filter(function(el) {
                  if(el.group_id === l)
                  {
                      return el
                  }
              });
          }
         },
  
        methods: {
           fetchData() {
               this.error = this.students = null;
               this.loading = true;   
               var gr = this;
               var st = this;
               axios
                    .get('/api/students')
                    .then(response => {
                    this.students = response.data;
                    st.students = response.data;
               })
               axios
                    .get('/api/groups')
                    .then(response => { this.groups = response.data 
                                        gr.groups = response.data
                    
                })            
            }
        }
    }      
</script>
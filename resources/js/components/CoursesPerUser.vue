<template>
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>Courses</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{

        }
    },
    mounted(){
        this.getCourses();
    },
    methods:{
        getCourses(){
            axios.get('/memberChart').then(response=>{

            })
        }
    }
}
</script>
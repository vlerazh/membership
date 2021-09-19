<template>
    <div class="card">
        <div class="card-body">
            <canvas id="memberChart" height="200"></canvas>
        </div>
    </div>
</template>

<script>
    import Chart from 'chart.js'
    import axios from 'axios'
    export default {
        name:'memberChart',
        data() {
            return {
               
            }
        },
        mounted() {
            this.drawChart();
        },
        methods: {
            drawChart() {
                axios.get('/memberChart').then(response=>{
                    console.log(response.data)
                     let ctx = document.getElementById("memberChart");
                
                    let myChart = new Chart(ctx, {
                        type: 'doughnut',
                          data: {
                            
                            datasets: [{
                            label: '# of Tomatoes',
                            data: [response.data.active_members, response.data.non_active_members],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                            }],
                            labels: ['Active Members', 'Non Active Members'],
                        },
                        options: {
                            
                        }
                    });
                })
               
            },
        }
    }
</script>

<template>
  <div class="card">
        <div class="card-body">
            <canvas id="chart" height="200"></canvas>
        </div>
    </div>
</template>

<script>
    import Chart from 'chart.js'
    import axios from 'axios'
    export default {
        name:'ItemChart',
        data() {
            return {
               
            }
        },
        mounted() {
            this.drawChart();
        },
        methods: {
            drawChart() {
                axios.get('/memberCourseChart').then(response=>{
                    console.log(response.data)
                     let ctx = document.getElementById("chart");
                
                    let myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: response.data.courses_names,
                            datasets: [{
                                    label: "Members Per Course",
                                    data: response.data.members,
                                    backgroundColor: "rgba(255,167,38,0.5)",
                                    borderColor: "rgb(255,167,38)",
                                    borderWidth: 3
                                },
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        stepSize: 1,
                                    }
                                }]
                            }
                        }
                    });
                })
               
            },
        }
    }
</script>

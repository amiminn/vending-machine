<template lang="">
    <div class="p-3">
        <canvas id="myChart" class="w-5/6"></canvas>
    </div>
</template>
<script>
import Chart from "chart.js/auto";

export default {
    data() {
        return {
            dataChart: [],
        };
    },
    methods: {
        async getData() {
            // let res = await axios.get("api/data-chart");
            // this.dataChart = res.data;
            this.loadData();
        },
        async loadData() {
            let delayed;
            new Chart(document.getElementById("myChart"), {
                type: "bar",
                data: {
                    datasets: [
                        {
                            data: this.dataChart,
                            label: "",
                            borderRadius: 8,
                            backgroundColor: [
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 205, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                            ],
                            borderColor: [
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(54, 162, 235)",
                                "rgb(153, 102, 255)",
                            ],
                            borderWidth: 1,
                        },
                    ],
                },
                height: 10,
                options: {
                    animation: {
                        onComplete: () => {
                            delayed = true;
                        },
                        delay: (context) => {
                            let delay = 0;
                            if (
                                context.type === "data" &&
                                context.mode === "default" &&
                                !delayed
                            ) {
                                delay =
                                    context.dataIndex * 1000 +
                                    context.datasetIndex * 500;
                            }
                            return delay;
                        },
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "top",
                        },
                        title: {
                            display: true,
                            text: "pendapatan perbulan",
                        },
                    },
                },
            });
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>

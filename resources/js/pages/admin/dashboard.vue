<template lang="">
    <layout>
        <ha> dashboard</ha>
        <div class="grid grid-cols-3 gap-3 ls font-bold text-2xl text-gray-700">
            <card>
                <div class="grid grid-cols-2">
                    <div>
                        <div>total pendapatan</div>
                        <div>Rp 34,4rb</div>
                    </div>
                    <div class="flex items-center justify-center">
                        <img
                            src="/icon/dashboard/chart-bar.svg"
                            class="w-16"
                            alt=""
                        />
                    </div>
                </div>
            </card>
            <card>
                <div class="grid grid-cols-2">
                    <div>
                        <div>produk</div>
                        <div>{{ dataDashboard.countProduk }}</div>
                    </div>
                    <div class="flex items-center justify-center">
                        <img
                            src="/icon/dashboard/basket-business-and-finance.svg"
                            class="w-16"
                            alt=""
                        />
                    </div>
                </div>
            </card>
            <card>
                <div class="grid grid-cols-2">
                    <div>
                        <div>total transaksi</div>
                        <div>{{ dataDashboard.countTransaksi }}</div>
                    </div>
                    <div class="flex items-center justify-center">
                        <img
                            src="/icon/dashboard/folder-data-storage.svg"
                            class="w-16"
                            alt=""
                        />
                    </div>
                </div>
            </card>
        </div>
        <card>
            <chart />
        </card>
    </layout>
</template>
<script>
import chart from "./chart.vue";
import layout from "./layout.vue";
export default {
    components: { layout, chart },
    data() {
        return {
            dataDashboard: {
                countProduk: 0,
                countTransaksi: 0,
            },
        };
    },
    methods: {
        async getData() {
            let res = await axios.get(this.$api.dashboard);
            this.dataDashboard = res.data;
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>

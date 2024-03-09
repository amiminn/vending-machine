<template lang="">
    <layout>
        <ha>> dashboard</ha>
        <div class="grid grid-cols-3 gap-3 ls font-bold text-2xl text-gray-700">
            <card>
                <div>total pendapatan</div>
                <div>Rp 34,4rb</div>
            </card>
            <card>
                <div>produk</div>
                <div>3</div>
            </card>
            <card>
                <div>total transaksi</div>
                <div>23</div>
            </card>
        </div>
        <card>
            chart trafik
            <chart />
        </card>
    </layout>
</template>
<script>
import chart from "./chart.vue";
import layout from "./layout.vue";
export default {
    components: { layout, chart },
};
</script>
<style lang=""></style>

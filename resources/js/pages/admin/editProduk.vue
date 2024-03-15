<template lang="">
    <layout>
        <ha>produk</ha>
        <div class="h-64 flex justify-center items-center">
            <div class="grid gap-12">
                <div class="text-rose-400 ls text-3xl">
                    fitur belum tersedia
                </div>
                <button
                    class="ls bg-slate-200 rounded-lg py-2 px-6"
                    onclick="history.back()"
                >
                    kembali
                </button>
            </div>
        </div>
    </layout>
</template>
<script>
import layout from "./layout.vue";
export default {
    components: { layout },
    data() {
        return {
            dataproduk: {},
        };
    },
    methods: {
        async getDataproduk() {
            // let res = await axios.get(this.$api.product);
            // this.dataproduk = res.data;
            // console.log(res.data);
        },
    },
    mounted() {
        this.getDataproduk();
    },
};
</script>
<style lang=""></style>

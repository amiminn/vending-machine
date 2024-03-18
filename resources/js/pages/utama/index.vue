<template lang="">
    <layout>
        <div class="flex justify-center">
            <template v-if="kosong">
                <loading></loading>
            </template>
            <template v-if="!kosong">
                <img :src="produk.gambar" alt="produk" class="w-2/4" />
            </template>
        </div>
        <div
            class="container sm:xl:w-1/3 h-1/2 absolute bottom-0 left-0 right-0 m-auto backdrop-blur-md bg-white/60 rounded-t-[42px] p-3 ls"
        >
            <div class="grid grid-rows-4 h-full text-3xl">
                <div
                    class="flex justify-center items-center text-center text-5xl mt-3 text-slate-600"
                >
                    <template v-if="kosong"></template>
                    <template v-if="!kosong">
                        {{ produk.nama }}
                    </template>
                </div>
                <div class="row-span-2 grid items-center">
                    <div class="flex justify-around gap-2 p-2 text-slate-600">
                        <div class="flex items-center justify-start">
                            <div
                                class="bg-white rounded-full cursor-pointer"
                                @click="prev()"
                            >
                                <img
                                    src="/icon/arrow-left.svg"
                                    alt=""
                                    class="h-16"
                                />
                            </div>
                        </div>
                        <div
                            class="text-slate-600 grid items-center text-center"
                        >
                            <template v-if="kosong">
                                produk tidak tersedia
                            </template>
                            <template v-if="!kosong">
                                <p>{{ produk.deskripsi }}</p>
                                <p>
                                    tersedia:
                                    <span class="text-rose-500 text-5xl">{{
                                        produk.stok
                                    }}</span>
                                    item
                                </p>
                            </template>
                        </div>
                        <div class="flex items-center justify-end">
                            <div
                                class="bg-white rounded-full cursor-pointer"
                                @click="next()"
                            >
                                <img
                                    src="/icon/arrow-right.svg"
                                    alt=""
                                    class="h-16"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div
                        class="bg-[#1C1E21] text-white rounded-full h-full flex items-center justify-between px-10"
                    >
                        <div class="">
                            <template v-if="kosong">
                                {{ $filters.harga(0) }}
                            </template>
                            <template v-if="!kosong">
                                {{ $filters.harga(produk.harga) }}
                            </template>
                        </div>
                        <template v-if="loading" class="text-white">
                            loading..
                        </template>
                        <template v-if="!loading">
                            <div
                                @click="bayar()"
                                class="rounded-full cursor-pointer bg-white w-24 flex justify-center"
                            >
                                <img src="/icon/cart.svg" alt="" class="h-16" />
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>
<script>
import layout from "./layout.vue";
export default {
    components: {
        layout,
    },
    data() {
        return {
            dataProduk: [],
            produk: {},
            listId: [],
            index: 0,
            loading: false,
            kosong: true,
        };
    },
    methods: {
        async bayar() {
            this.loading = true;
            try {
                let res = await axios.post("/api/create-transaksi", {
                    idProduk: this.listId[this.index],
                });
                window.location.href = res.data;
                this.loading = false;
            } catch (error) {
                this.loading = false;
                console.error(error);
            }
        },
        async getData() {
            let res = await axios.get(this.$api.produk);
            let data = res.data;
            this.dataProduk = data;
            this.listId = data.map((d) => {
                return d.id;
            });
            this.loadProduk();
        },
        findProduk(id) {
            return _.find(this.dataProduk, ["id", id]);
        },
        next() {
            this.index += 1;
            if (this.index < this.max()) {
                this.loadProduk();
            } else {
                this.index = 0;
                this.loadProduk();
            }
        },
        prev() {
            if (this.index == 0) {
                this.index = this.max() - 1;
                this.loadProduk();
            } else {
                this.index -= 1;
                this.loadProduk();
            }
        },
        max() {
            return this.listId.length;
        },
        loadProduk() {
            this.produk = this.findProduk(this.listId[this.index]);
            this.kosong = !_.isObject(this.produk);
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>

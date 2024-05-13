<template lang="">
    <layout>
        <swiper
            :loop="true"
            :slides-per-view="1"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
        >
            <template v-for="(d, index) in dataProduk" :key="index">
                <swiper-slide>
                    <div class="flex justify-center -my-2">
                        <img
                            :src="d.gambar"
                            alt="produk"
                            class="w-60 h-[21rem]"
                        />
                    </div>
                </swiper-slide>
            </template>
        </swiper>
        <div
            class="z-50 container sm:xl:w-1/3 h-1/2 absolute bottom-0 left-0 right-0 m-auto backdrop-blur-md bg-white/60 rounded-t-[42px] p-3 ls"
        >
            <div class="grid h-full grid-rows-4 text-3xl">
                <div
                    class="flex items-center justify-center mt-3 text-5xl text-center text-slate-600"
                >
                    <template v-if="kosong"></template>
                    <template v-if="!kosong">
                        {{ produk.nama }}
                    </template>
                </div>
                <div class="grid items-center row-span-2">
                    <div class="flex justify-around gap-2 p-2 text-slate-600">
                        <div class="flex items-center justify-start">
                            <div
                                v-if="!kosong"
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
                            class="grid items-center text-center text-slate-600"
                        >
                            <template v-if="kosong">
                                produk tidak tersedia
                            </template>
                            <template v-if="!kosong">
                                <p>{{ produk.deskripsi }}</p>
                                <p>
                                    tersedia:
                                    <span class="text-5xl text-rose-500">{{
                                        produk.stok
                                    }}</span>
                                    item
                                </p>
                            </template>
                        </div>
                        <div class="flex items-center justify-end">
                            <div
                                v-if="!kosong"
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
                                class="flex justify-center w-24 bg-white rounded-full cursor-pointer"
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
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
export default {
    components: {
        layout,
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            swiper: null,
            dataProduk: [],
            produk: {},
            listId: [],
            index: 0,
            loading: false,
            kosong: true,
        };
    },
    methods: {
        onSwiper(swiper) {
            this.swiper = swiper;
        },
        onSlideChange(e) {
            this.index = e.realIndex;
            this.loadProduk();
        },
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
            this.swiper.slideNext();
        },
        prev() {
            this.swiper.slidePrev();
        },
        loadProduk() {
            this.produk = this.findProduk(this.listId[this.index]);
            this.kosong = !_.isObject(this.produk);
        },
    },
    mounted() {
        this.getData();
        this.next();
    },
};
</script>
<style lang=""></style>

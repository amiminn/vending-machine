<template lang="">
    <layout>
        <div class="flex justify-center">
            <img src="/produk/sprite.png" alt="produk" class="w-2/4" />
        </div>
        <div
            class="container sm:xl:w-1/3 h-1/2 absolute bottom-0 left-0 right-0 m-auto backdrop-blur-md bg-white/60 rounded-t-[42px] p-3 ls"
        >
            <div class="grid grid-rows-4 h-full text-3xl">
                <div
                    class="flex justify-center items-center text-5xl mt-3 text-slate-600"
                >
                    Sprite
                </div>
                <div class="row-span-2 grid items-center">
                    <div class="flex justify-around gap-2 p-2 text-slate-600">
                        <div class="flex items-center justify-start">
                            <div class="bg-white rounded-full">
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
                            <p>minuman soda</p>
                            <p>
                                tersedia:
                                <span class="text-rose-500 text-5xl">6</span>
                                item
                            </p>
                        </div>
                        <div class="flex items-center justify-end">
                            <div class="bg-white rounded-full">
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
                        <div class="">Rp 4.300</div>
                        <div
                            class="rounded-full bg-white w-24 flex justify-center"
                        >
                            <img src="/icon/cart.svg" alt="" class="h-16" />
                        </div>
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
            produk: [
                {
                    nama: "coca-cola",
                },
            ],
        };
    },
};
</script>
<style lang=""></style>

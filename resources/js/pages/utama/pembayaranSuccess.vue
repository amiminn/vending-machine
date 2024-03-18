<template lang="">
    <layout>
        <div
            class="container sm:xl:w-1/3 h-4/5 absolute bottom-0 left-0 right-0 m-auto backdrop-blur-md bg-white/60 rounded-t-[42px] p-3 ls"
        >
            <div class="grid grid-rows-4 h-full text-3xl">
                <div
                    class="flex justify-center text-center items-center text-5xl mt-3 text-green-500"
                >
                    pembayaran success
                </div>
                <div class="flex justify-center">
                    <img src="/icon/checked-success.svg" alt="" class="w-44" />
                </div>

                <div
                    class="flex justify-center items-center text-2xl mt-3 text-slate-500 p-20 text-center"
                >
                    Silahkan ambil minuman yang telah dibeli.
                </div>

                <div class="absolute bottom-5 left-0 right-0 m-auto p-3">
                    <Link
                        href="/"
                        class="bg-[#1C1E21] text-white rounded-full h-28 flex items-center justify-between px-10"
                    >
                        <div class="">lanjut belanja</div>
                        <div
                            class="rounded-full bg-white w-24 flex justify-center"
                        >
                            <img src="/icon/cart.svg" alt="" class="h-16" />
                        </div>
                    </Link>
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
        return {};
    },
};
</script>
<style lang=""></style>

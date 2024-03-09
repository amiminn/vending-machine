<template lang="">
    <div
        class="flex justify-center bg-cover bg-center bg-fixed bg-slate-300 relative"
    >
        <div
            class="container bg-gradient-to-b from-[#9196ad] to-[#eaeafb] sm:xl:w-1/3 min-h-screen"
        >
            <header>
                <div class="rounded-lg m-3">
                    <div class="grid grid-cols-2 p-5 text-white">
                        <div class="font-extrabold text-3xl game">VM Me</div>
                    </div>
                </div>
            </header>
            <!-- <slot></slot> -->
            <div class="flex justify-center">
                <img src="/produk/sprite.png" alt="produk" class="w-2/4" />
            </div>
            <div
                class="container sm:xl:w-1/3 h-1/2 absolute bottom-0 left-0 right-0 m-auto bg-[#DDDDE4] rounded-t-[42px] p-3 ls"
            >
                <div class="grid grid-rows-4 h-full text-3xl">
                    <div
                        class="flex justify-center text-4xl mt-3 text-slate-600"
                    >
                        Sprite
                    </div>
                    <div></div>
                    <div class="grid grid-cols-2 gap-2 p-2 text-slate-600">
                        <div></div>
                        <div></div>
                    </div>
                    <div>
                        <div
                            class="bg-[#1C1E21] text-white rounded-full h-full flex items-center justify-between px-10"
                        >
                            <div class="">Rp 4.300</div>
                            <div class="rounded-full bg-white">
                                <!-- <vue-feather type="shopping-cart"></vue-feather> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

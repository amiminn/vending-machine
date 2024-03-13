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
                        <div
                            class="font-extrabold text-3xl game flex items-center"
                        >
                            VM Me
                        </div>
                        <div class="flex justify-end">
                            <div class="rounded-lg">
                                <img
                                    src="/icon/cart-2.svg"
                                    class="h-16 text-blue-600"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

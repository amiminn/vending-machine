<template lang="">
    <!-- <div v-if="show">
        <div class="flex justify-between mb-1">
            <span> </span>
            <span class="text-sm font-bold text-bg">
                {{ setting.indexMulai }}%
            </span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div
                class="bg-emerald-400 h-3 rounded-full"
                :style="{ width: setting.indexMulai + '%' }"
            ></div>
        </div>
    </div> -->
</template>
<script>
export default {
    data() {
        return {
            show: false,
            setting: {
                indexMulai: 0,
                timeout: 2,
                hide_after: 3,
            },
        };
    },
    methods: {
        // start() {
        //     this.show = true;
        //     const interval = setInterval(() => {
        //         this.setting.indexMulai = (this.setting.indexMulai % 100) + 1;
        //         if (this.setting.indexMulai === 100) {
        //             clearInterval(interval);
        //             setTimeout(() => {
        //                 this.show = false;
        //             }, 2000);
        //         }
        //     }, (this.setting.timeout * 1000) / 100);
        // },
        async hit(ip) {
            try {
                let res = await axios.get("http://" + ip + "/success");
                toast("Oops, sepertinya ada transaksi baru.", "info");
            } catch (error) {
                toast("Oops, sepertinya ada kesalahan pada alat.", "error");
            }
        },
        async hitSimulasi(ip) {
            try {
                let res = await axios.get("http://" + ip + "/success");
                toast("simulasi alat.", "info");
            } catch (error) {
                toast("Oops, sepertinya ada kesalahan pada alat.", "error");
            }
        },
    },
    mounted() {
        Echo.channel("transaksi").listen(".transaksi.baru", (e) => {
            this.hit(e.callback.ip);
        });
        Echo.channel("simulasi").listen(".simulasi", (e) => {
            this.hitSimulasi(e.callback.ip);
        });
    },
};
</script>
<style lang=""></style>

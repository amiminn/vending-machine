<template lang="">
    <layout>
        <ha>Pengaturan</ha>
        <div class="grid grid-cols-2 gap-3">
            <form @submit.prevent="updatePengaturan()">
                <card>
                    <div class="grid gap-3 my-5">
                        <label>ip address IOT</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="dataPengaturan.ip"
                        />
                        <label>ngrok address</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="dataPengaturan.serverNgrok"
                        />
                        <button
                            type="submit"
                            class="py-2 bg-slate-400 rounded-lg text-white"
                        >
                            update
                        </button>
                    </div>
                </card>
            </form>
            <div>
                <card>
                    <div class="grid gap-3 my-5">
                        <div class="ls text-slate-600 text-xl text-center">
                            cek alat IOT
                        </div>
                        <button
                            @click="servo(1)"
                            class="py-2 bg-slate-400 rounded-lg text-white"
                        >
                            servo-1
                        </button>
                        <button
                            @click="servo(2)"
                            class="py-2 bg-slate-400 rounded-lg text-white"
                        >
                            servo-2
                        </button>
                    </div>
                </card>
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
            dataPengaturan: {
                ip: "0.0.0.0",
                serverNgrok: "fc8d-103-186-91-17.ngrok-free.app",
            },
            loadingCek: "cek sekarang",
        };
    },
    methods: {
        async getDataPengaturan() {
            let res = await axios.get(this.$api.pengaturan);
            this.dataPengaturan.serverNgrok = res.data.server;
            this.dataPengaturan.ip = res.data.ip;
        },
        async updatePengaturan() {
            let res = await axios.post(
                this.$api.pengaturan,
                this.dataPengaturan
            );
            toast(res.data.msg);
        },
        async servo(id) {
            let getIot = "http://" + this.dataPengaturan.ip + "/endpoint-" + id;
            try {
                let res = await axios.get(getIot);
                toast("simulasi servo " + id);
            } catch (error) {}
        },
    },
    mounted() {
        this.getDataPengaturan();
    },
};
</script>
<style lang=""></style>

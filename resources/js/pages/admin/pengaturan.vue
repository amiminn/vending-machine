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
                        <button
                            type="submit"
                            class="py-2 bg-slate-400 rounded-lg text-white"
                        >
                            update
                        </button>
                    </div>
                </card>
            </form>
            <form @submit.prevent="cekIot()">
                <card>
                    <div class="grid gap-3 my-5">
                        <div class="ls text-slate-600 text-xl text-center">
                            cek iot response
                        </div>
                        <button
                            type="submit"
                            class="py-2 bg-slate-400 rounded-lg text-white"
                        >
                            {{ loadingCek }}
                        </button>
                    </div>
                </card>
            </form>
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
            },
            loadingCek: "cek sekarang",
        };
    },
    methods: {
        async getDataPengaturan() {
            let res = await axios.get(this.$api.pengaturan);
            this.dataPengaturan = res.data;
        },
        async updatePengaturan() {
            let res = await axios.post(
                this.$api.pengaturan,
                this.dataPengaturan
            );
            toast(res.data.msg);
        },
        cekIot() {
            this.loadingCek = "loading";
            axios.get("/api/simulasi").then(() => {
                this.loadingCek = "cek sekarang";
            });
        },
    },
    mounted() {
        this.getDataPengaturan();
    },
};
</script>
<style lang=""></style>

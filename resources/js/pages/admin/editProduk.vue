<template lang="">
    <layout>
        <ha>produk</ha>
        <!-- <div class="h-64 flex justify-center items-center">
            <div class="grid gap-12">
                <div class="text-rose-400 ls text-3xl">
                    Oops, data yang dituju tidak tersedia
                </div>
                <button
                    class="ls bg-slate-200 rounded-lg py-2 px-6"
                    onclick="history.back()"
                >
                    kembali
                </button>
            </div>
        </div> -->
        <div class="grid gap-4 grid-cols-2">
            <form @submit.prevent="updateProduk">
                <card>
                    <div class="cursor-pointer mb-3" onclick="history.back()">
                        <img src="/icon/arrow-left.svg" class="w-10" alt="" />
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <label>nama produk</label>
                            <input
                                type="text"
                                class="form-input"
                                v-model="dataproduk.nama"
                            />
                        </div>
                        <div>
                            <label>harga</label>
                            <input
                                type="text"
                                class="form-input"
                                v-model="dataproduk.harga"
                            />
                        </div>
                        <div>
                            <label>deskripsi</label>
                            <input
                                type="text"
                                class="form-input"
                                v-model="dataproduk.deskripsi"
                            />
                        </div>
                        <div>
                            <label>sisa stok</label>
                            <input
                                type="text"
                                class="form-input"
                                v-model="dataproduk.stok"
                            />
                        </div>
                        <button
                            class="bg-slate-600 py-2 px-6 rounded-lg text-white"
                        >
                            update
                        </button>
                    </div>
                </card>
            </form>
            <card>
                <div class="flex justify-center items-center h-full">
                    <img :src="dataproduk.gambar" alt="" class="h-48" />
                </div>
            </card>
        </div>
        <card>
            <button
                @click="deleteProduk"
                class="bg-red-400 py-2 rounded-lg w-full text-white"
            >
                Hapus produk
            </button>
        </card>
    </layout>
</template>
<script>
import layout from "./layout.vue";
export default {
    components: { layout },
    props: ["id"],
    data() {
        return {
            dataproduk: {},
            kosong: true,
        };
    },
    methods: {
        async getDataproduk() {
            let res = await axios.get(this.$api.produk + "/" + this.id);
            this.dataproduk = res.data;
        },
        async updateProduk() {
            try {
                let res = await axios.put(
                    this.$api.produk + "/" + this.id,
                    this.dataproduk
                );
                toast(res.data.msg);
            } catch (error) {}
        },
        async apiDelete() {
            let res = await axios.delete(this.$api.produk + "/" + this.id);
            return res.data.msg;
        },
        async deleteProduk() {
            Swal.fire({
                title: "Apakah yakin hapus produk?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya,hapus produk!",
            }).then((result) => {
                if (result.isConfirmed) {
                    try {
                        let msg = this.apiDelete();
                        Swal.fire({
                            title: "Terhapus!",
                            text: msg,
                            icon: "success",
                        });
                        window.history.back();
                    } catch (error) {}
                }
            });
        },
    },
    mounted() {
        this.getDataproduk();
    },
};
</script>
<style lang=""></style>

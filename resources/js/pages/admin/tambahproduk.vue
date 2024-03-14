<template lang="">
    <layout>
        <ha>tambah produk baru</ha>
        <form @submit.prevent="addProduk">
            <card>
                <div class="cursor-pointer mb-3" onclick="history.back()">
                    <img src="/icon/arrow-left.svg" class="w-10" alt="" />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label>nama produk</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="dataProduk.nama"
                        />
                    </div>
                    <div>
                        <label>stok produk</label>
                        <input
                            type="number"
                            class="form-input"
                            v-model="dataProduk.stok"
                        />
                    </div>
                    <div>
                        <label>harga produk (Rp)</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="dataProduk.harga"
                        />
                    </div>
                    <div>
                        <label>deskripsi produk</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="dataProduk.deskripsi"
                        />
                    </div>
                </div>

                <div class="my-3 flex justify-center">
                    <input
                        type="file"
                        class="hidden"
                        id="upHere"
                        @change="preview"
                    />
                    <div
                        v-if="!isFile.path"
                        class="h-40 w-40 bg-gray-100 border-4 border-dashed rounded cursor-pointer flex justify-center items-stretch"
                        @click="selectFile"
                    >
                        <div class="self-center text-gray-500 font-bold italic">
                            [Thumbnail]
                        </div>
                    </div>

                    <img
                        class="h-40 w-40 rounded cursor-pointer"
                        v-if="isFile.path"
                        :src="isFile.path"
                        alt="Thumbnail"
                    />
                </div>

                <div
                    v-if="isFile.name"
                    class="mx-3 mt-2 flex justify-center gap-2"
                >
                    <div
                        class="px-6 rounded bg-sky-800 text-sm text-white italic"
                    >
                        {{ isFile.name ?? "" }}
                    </div>
                    <div
                        class="bg-red-500 rounded text-sm px-4 text-white cursor-pointer"
                        @click="removeImg"
                    >
                        x
                    </div>
                </div>

                <button class="py-2 bg-gray-800 text-white w-full my-3 rounded">
                    submit
                </button>
            </card>
        </form>
    </layout>
</template>
<script>
import layout from "./layout.vue";
export default {
    components: { layout },
    data() {
        return {
            isFile: {
                name: null,
                path: null,
            },
            dataProduk: {
                nama: null,
                deskripsi: null,
                harga: 0,
                stok: 1,
                gambar: null,
            },
        };
    },
    methods: {
        async addProduk() {
            try {
                let formData = new FormData();
                formData.append("gambar", this.dataProduk.gambar);
                formData.append("nama", this.dataProduk.nama);
                formData.append("deskripsi", this.dataProduk.deskripsi);
                formData.append("harga", this.dataProduk.harga);
                formData.append("stok", this.dataProduk.stok);
                let res = await axios.post(this.$api.produk, formData);
                toast(res.data.msg);
                window.history.back();
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
        selectFile() {
            let upHere = document.querySelector("#upHere");
            upHere.click();
        },
        preview(e) {
            this.isFile.name = e.target.files[0].name;
            let src = URL.createObjectURL(e.target.files[0]);
            this.isFile.path = src;
            this.dataProduk.gambar = e.target.files[0];
        },
        removeImg() {
            this.isFile = {
                name: null,
                path: null,
            };
        },
    },
};
</script>
<style lang=""></style>

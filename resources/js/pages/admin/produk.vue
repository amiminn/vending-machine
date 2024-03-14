<template lang="">
    <layout>
        <ha>produk</ha>
        <card>
            <div class="mb-4 flex justify-end">
                <Link
                    href="tambah-product"
                    class="bg-gray-600 text-white px-5 py-2 rounded"
                >
                    tambahkan produk baru
                </Link>
            </div>
            <div class="overflow-auto rounded">
                <table class="w-full text-left">
                    <thead class="bg-gray-600 text-white">
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>gambar</th>
                            <th>stok</th>
                            <th>harga</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d, index) in dataProduk" :key="index">
                            <td>1</td>
                            <td>{{ d.nama }}</td>
                            <td>
                                <img :src="d.gambar" class="w-6" alt="" />
                            </td>
                            <td>{{ d.stok }}</td>
                            <td>{{ $filters.harga(d.harga) }}</td>
                            <td>
                                <a
                                    href="#"
                                    class="flex items-center font-bold gap-2"
                                >
                                    <img
                                        src="/icon/dashboard/edit.svg"
                                        class="w-8"
                                        alt=""
                                    />
                                    edit
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </card>
    </layout>
</template>
<script>
import layout from "./layout.vue";
export default {
    components: { layout },
    data() {
        return {
            dataProduk: [],
        };
    },
    methods: {
        async getDataProduk() {
            let res = await axios.get(this.$api.produk);
            console.log(res);
            this.dataProduk = res.data;
        },
    },
    mounted() {
        this.getDataProduk();
    },
};
</script>
<style lang=""></style>

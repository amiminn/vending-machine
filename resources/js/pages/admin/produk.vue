<template lang="">
    <layout>
        <ha>produk</ha>
        <card>
            <div class="flex justify-end mb-4">
                <Link
                    href="tambah-product"
                    class="px-5 py-2 text-white bg-gray-600 rounded"
                >
                    tambahkan produk baru
                </Link>
            </div>
            <div class="overflow-auto rounded">
                <table class="w-full text-left">
                    <thead class="text-white bg-gray-600">
                        <tr>
                            <th>no</th>
                            <th>produk</th>
                            <th>gambar</th>
                            <th>stok</th>
                            <th>harga</th>
                            <th>servo</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d, index) in dataProduk" :key="index">
                            <td>{{ index + 1 }}</td>
                            <td>{{ d.nama }}</td>
                            <td>
                                <img :src="d.gambar" class="w-6" alt="" />
                            </td>
                            <td>{{ d.stok }}</td>
                            <td>{{ $filters.harga(d.harga) }}</td>
                            <td>
                                {{
                                    d.endpoint == "endpoint-1"
                                        ? "servo-1"
                                        : "servo-2"
                                }}
                            </td>
                            <td>
                                <Link
                                    :href="'/product=' + d.id"
                                    class="flex items-center gap-2 font-bold"
                                >
                                    <img
                                        src="/icon/dashboard/edit.svg"
                                        class="w-8"
                                        alt=""
                                    />
                                    <span class="text-slate-600">edit</span>
                                </Link>
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
            this.dataProduk = res.data;
        },
        edit(id) {
            Swal.fire({
                title: "Edit data?",
                text: "fitur edit belum tersedia.",
                icon: "error",
            });
        },
    },
    mounted() {
        this.getDataProduk();
    },
};
</script>
<style lang=""></style>

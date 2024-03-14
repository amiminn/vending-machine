<template lang="">
    <layout>
        <ha>laporan transaksi penjualan</ha>
        <card>
            <!-- <div class="mb-4 flex justify-end">
                <a href="#" class="bg-gray-600 text-white px-5 py-2 rounded">
                    download laporan (pdf)
                </a>
            </div> -->
            <div class="overflow-auto rounded">
                <table class="w-full text-left">
                    <thead class="bg-gray-600 text-white">
                        <tr>
                            <th>no</th>
                            <th>customer</th>
                            <th>produk</th>
                            <th>tanggal transaksi</th>
                            <th>status transaksi</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d, index) in dataTransaksi" :key="index">
                            <td>{{ index + 1 }}</td>
                            <td>
                                {{
                                    JSON.parse(d.data_produk).data.customer_name
                                }}
                            </td>
                            <td>
                                {{
                                    JSON.parse(d.data_produk).data
                                        .order_items[0].name
                                }}
                            </td>
                            <td>{{ d.created_at.slice(0, 16) }}</td>
                            <td>{{ $filters.status(d.status) }}</td>
                            <td>
                                {{
                                    $filters.harga(
                                        JSON.parse(d.data_produk).data.amount
                                    )
                                }}
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
            dataTransaksi: [],
        };
    },
    methods: {
        async getData() {
            let res = await axios.get(this.$api.transaksi);
            this.dataTransaksi = res.data;
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>

<template lang="">
    <layout>
        <ha>laporan transaksi penjualan</ha>
        <card>
            <div class="mb-4 flex justify-end">
                <a href="#" class="bg-gray-600 text-white px-5 py-2 rounded">
                    download laporan (pdf)
                </a>
            </div>
            <div class="overflow-auto rounded">
                <table class="w-full text-left">
                    <thead class="bg-gray-600 text-white">
                        <tr>
                            <th>no</th>
                            <th>customer</th>
                            <th>produk</th>
                            <th>tanggal transaksi</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>customer</td>
                            <td>cola</td>
                            <td>02-03-2024</td>
                            <td>Rp 3.800</td>
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
};
</script>
<style lang=""></style>

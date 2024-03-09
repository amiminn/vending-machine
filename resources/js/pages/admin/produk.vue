<template lang="">
    <layout>
        <ha>> produk</ha>
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
                        <tr>
                            <td>1</td>
                            <td>cola</td>
                            <td>
                                <img
                                    src="/produk/sprite.png"
                                    class="w-6"
                                    alt=""
                                />
                            </td>
                            <td>3</td>
                            <td>Rp 3.800</td>
                            <td>
                                <a
                                    href="#"
                                    class="bg-gray-600 text-white px-5 py-2 rounded"
                                    >lihat</a
                                >
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
};
</script>
<style lang=""></style>

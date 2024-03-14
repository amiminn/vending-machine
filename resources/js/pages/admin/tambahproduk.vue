<template lang="">
    <layout>
        <ha>tambah produk baru</ha>
        <card>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label>nama produk</label>
                    <input type="text" class="form-input" />
                </div>
                <div>
                    <label>harga produk</label>
                    <input type="text" class="form-input" />
                </div>
                <div>
                    <label>stok produk</label>
                    <input type="number" class="form-input" />
                </div>
                <div>
                    <label>gambar produk</label>
                    <input type="file" class="form-file" />
                </div>
            </div>

            <button class="py-2 bg-gray-800 text-white w-full my-3 rounded">
                submit
            </button>
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

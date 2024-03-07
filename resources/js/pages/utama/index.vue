<template lang="">
    <layout>
        <div v-for="(d, index) in produk" :key="index">
            {{ d.nama }}
        </div>
    </layout>
</template>
<script>
import layout from "./layout.vue";
export default {
    components: {
        layout,
    },
    data() {
        return {
            produk: [
                {
                    nama: "coca-cola",
                },
            ],
        };
    },
};
</script>
<style lang=""></style>

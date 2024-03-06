import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";
import toRupiah from "@develoka/angka-rupiah-js";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.component("Link", Link);

        app.config.globalProperties.$api = {
            auth: {
                login: "/login",
            },
        };

        app.config.globalProperties.$filters = {
            status(data = null) {
                if (data == 1) return "Aktif";
                if (data == 0) return "Nonaktif";
            },
            stok(data = null) {
                if (data > 1) return data;
                if (data < 1) return "Habis";
            },
            diskon(data = null) {
                if (data == 1) return "ya";
                if (data == 0) return "tidak";
            },
            harga(num = 0) {
                return toRupiah(num, { formal: false, floatingPoint: 0 });
            },
            hargaGroup(num = 0, gap = 2) {
                return toRupiah(num, {
                    formal: false,
                    useUnit: true,
                    spaceBeforeUnit: true,
                    floatingPoint: gap,
                });
            },
            tanggal(input) {
                return input.substr(0, 10);
            },
            invoice(input) {
                return input.substr(0, 8) + "...";
            },
            statusBayar(data) {
                if (data == 1) return "selesai";
                if (data == 2) return "proses";
                if (data == 0) return "belum dibayar";
            },
        };
        app.use(plugin);
        app.mount(el);
    },
});

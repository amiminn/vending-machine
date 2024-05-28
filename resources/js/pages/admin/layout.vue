<template lang="">
    <div class="bg-[#F5F9FC] h-screen">
        <button
            data-drawer-target="sidebar-multi-level-sidebar"
            data-drawer-toggle="sidebar-multi-level-sidebar"
            aria-controls="sidebar-multi-level-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg ms-3 sm:hidden hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
        >
            <span class="sr-only">Open sidebar</span>
            <img src="/icon/list.svg" class="w-8" alt="" />
        </button>

        <aside
            id="sidebar-multi-level-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar"
        >
            <div
                class="h-full px-3 py-4 overflow-y-auto bg-white text-slate-800"
            >
                <div class="py-2 mb-2">
                    <div class="text-4xl font-bold game text-slate-700">
                        🍨 VM Me
                    </div>
                </div>
                <hr class="my-2" />
                <div class="">
                    <ul class="space-y-2 font-medium">
                        <!-- <li
                            class="flex justify-center text-xl font-semibold text-slate-500 ls"
                        >
                            Toko
                        </li> -->
                        <li :class="{ on: $page.url === '/dashboard' }">
                            <Link
                                href="dashboard"
                                class="flex items-center p-2 rounded-lg hover:bg-gray-300 group"
                            >
                                <img
                                    src="/icon/dashboard/pie-chart.svg"
                                    class="w-6"
                                    alt=""
                                />
                                <span class="ms-3">Dashboard</span>
                            </Link>
                        </li>
                        <li :class="{ on: $page.url === '/penjualan' }">
                            <Link
                                href="penjualan"
                                class="flex items-center p-2 rounded-lg hover:bg-gray-300 group"
                            >
                                <img
                                    src="/icon/dashboard/notebook.svg"
                                    class="w-6"
                                    alt=""
                                />
                                <span class="ms-3">Penjualan</span>
                            </Link>
                        </li>
                        <li
                            :class="{
                                on:
                                    $page.url === '/product' ||
                                    $page.url === '/tambah-product',
                            }"
                        >
                            <Link
                                href="product"
                                class="flex items-center p-2 rounded-lg hover:bg-gray-300 group"
                            >
                                <img
                                    src="/icon/dashboard/tag-price.svg"
                                    class="w-6"
                                    alt=""
                                />
                                <span class="ms-3">Produk</span>
                            </Link>
                        </li>
                        <hr />
                        <li :class="{ on: $page.url === '/pengaturan' }">
                            <Link
                                href="pengaturan"
                                class="flex items-center p-2 rounded-lg hover:bg-gray-300 group"
                            >
                                <img
                                    src="/icon/dashboard/settings.svg"
                                    class="w-6"
                                    alt=""
                                />
                                <span class="ms-3">Pengaturan</span>
                            </Link>
                        </li>
                    </ul>
                    <ul
                        class="absolute inset-x-0 bottom-0 p-2 space-y-2 font-medium"
                    >
                        <li>
                            <button
                                @click="logout()"
                                class="flex items-center w-full p-2 font-bold rounded-lg text-rose-400 bg-rose-100 group"
                            >
                                <img
                                    src="/icon/dashboard/cancel.svg"
                                    class="w-6"
                                    alt=""
                                />
                                <span class="ms-3">Log out</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <div class="grid gap-3 p-4 sm:ml-64">
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        async hit(ip) {
            try {
                let res = await axios.get(ip);
                toast("Oops, sepertinya ada transaksi baru.", "info");
            } catch (error) {
                toast("Oops, sepertinya ada kesalahan pada alat.", "error");
            }
        },
        async logout() {
            Swal.fire({
                title: "Yakin logout aplikasi?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Logout",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil logout!",
                        icon: "success",
                    });
                    router.get("/login");
                }
            });
        },
    },
    mounted() {
        Echo.channel("transaksi").listen(".transaksi.baru", (e) => {
            console.log("hit endpoint");
            axios
                .get(e.callback.hit)
                .then(() => {
                    toast("Oops, sepertinya ada transaksi baru.", "info");
                })
                .catch(() => {
                    toast("Oops, sepertinya ada kesalahan pada alat.", "error");
                });
        });
    },
};
</script>

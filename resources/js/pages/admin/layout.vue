<template lang="">
    <div>
        <button
            data-drawer-target="sidebar-multi-level-sidebar"
            data-drawer-toggle="sidebar-multi-level-sidebar"
            aria-controls="sidebar-multi-level-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
        >
            <span class="sr-only">Open sidebar</span>
            <vue-feather type="list"></vue-feather>
        </button>

        <aside
            id="sidebar-multi-level-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar"
        >
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                <div class="py-2 mb-2">
                    <div class="text-4xl font-bold">🍨 VM</div>
                </div>
                <div class="">
                    <ul class="space-y-2 font-medium">
                        <li class="border-r-4 border-gray-300 pr-1">
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300 group"
                            >
                                <vue-feather type="grid"></vue-feather>
                                <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300 group"
                            >
                                <vue-feather type="file-text"></vue-feather>
                                <span class="ms-3">Penjualan</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300 group"
                            >
                                <vue-feather type="coffee"></vue-feather>
                                <span class="ms-3">Produk</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300 group"
                            >
                                <vue-feather type="tablet"></vue-feather>
                                <span class="ms-3">Simulator</span>
                            </a>
                        </li>
                    </ul>
                    <ul
                        class="space-y-2 font-medium fixed inset-x-0 bottom-0 p-2"
                    >
                        <li>
                            <a
                                class="flex items-center font-bold p-2 text-rose-400 rounded-lg bg-rose-100 group"
                            >
                                <vue-feather type="arrow-right"></vue-feather>
                                <span class="ms-3">Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <div class="p-4 sm:ml-64">
            <div class="p-4 border-4 border-gray-200 border-dashed rounded-lg">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

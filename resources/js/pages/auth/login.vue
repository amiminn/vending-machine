<template lang="">
    <section class="min-h-screen">
        <div
            class="flex flex-col items-center justify-center bg-[#F5F9FC] px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <div
                class="game flex items-center gap-3 mb-6 text-3xl sm:lg:text-5xl font-semibold text-slate-600"
            >
                <img src="/icon/components/lock.svg" class="w-16" alt="" />
                VM Me
            </div>
            <div
                class="space-y-4 md:space-y-6 bg-white w-80 px-7 py-16 rounded border-4 border-dashed"
            >
                <form class="space-y-4 md:space-y-6" @submit.prevent="login">
                    <div>
                        <label for="username" class="label">Username</label>
                        <input
                            class="form-input"
                            id="username"
                            placeholder="username"
                            value="admin"
                            required=""
                        />
                    </div>
                    <div>
                        <label for="password" class="label">Password</label>
                        <input
                            type="password"
                            id="password"
                            value="admin123"
                            placeholder="***"
                            class="form-input"
                            required=""
                        />
                    </div>
                    <Link
                        href="dashboard"
                        type="submit"
                        class="bg-sky-900 py-2 text-white text-center text-lg w-full rounded"
                    >
                        Sign in
                    </Link>
                </form>
            </div>
        </div>
    </section>
</template>
<script>
export default {};
</script>
<style lang=""></style>

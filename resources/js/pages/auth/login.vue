<template lang="">
    <section class="min-h-screen bg-[#19192d]">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <div
                class="game flex items-center mb-6 text-3xl sm:lg:text-5xl font-semibold text-sky-300"
            >
                VM Me
            </div>
            <div
                class="space-y-4 md:space-y-6 bg-white w-80 px-7 py-16 rounded"
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

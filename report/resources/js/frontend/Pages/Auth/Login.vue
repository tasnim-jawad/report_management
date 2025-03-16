<template>
    <Layout>
        <div class="row justify-content-center align-items-center gap-2 py-5">
            <div class="col-md-5">
                <form @submit.prevent="LoginSubmitHandler">
                    <h3>Login Here</h3>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            class="form-control"
                            type="email"
                            placeholder="Enter your email"
                            name="email"
                        />
                    </div>
                    <div class="form-group password-icon">
                        <label for="password">Password</label>
                        <div class="password-icon">
                            <input
                                class="form-control"
                                :type="showPassword ? 'text' : 'password'"
                                placeholder="Enter your password"
                                name="password"
                                value="12345678"
                            />
                            <i
                                class="fa-solid fa-eye-slash"
                                :class="[
                                    { 'fa-eye': showPassword },
                                    passwordError ? 'top-33' : '',
                                ]"
                                @click="showPassword = !showPassword"
                            ></i>
                        </div>
                    </div>

                    <button
                        class="my-3 btn btn-outline-success"
                        type="submit"
                        id="spiner"
                    >
                        <span v-if="!loading">Log In</span>
                        <template v-if="loading">
                            <span
                                class="spinner-border spinner-border-sm mx-2"
                                role="status"
                                aria-hidden="true"
                            ></span>
                            <span class="">Loading...</span>
                        </template>
                    </button>
                    <span>Dont have an account ?</span>
                    <Link href="/register" class="font-size-12 text-primary">
                        Register</Link
                    >
                    <br />
                    <Link href="/forgot-password" class="text-info"
                        >Forgot Password ?</Link
                    >
                </form>
            </div>
            <div class="col-md-5">
                <div id="userList">
                    <table
                        class="table table-dark table-striped table-hover table-bordered"
                    >
                        <thead class="sticky-top">
                            <tr>
                                <th scope="col">Email</th>
                                <!-- <th scope="col">Password</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Thana Amir</td>
                                <!-- <td>@12345678</td> -->
                                <td>
                                    <button
                                        @click="
                                            setPassword('thana_amir@gmail.com')
                                        "
                                        class="btn btn-outline-info"
                                    >
                                        Login
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>Ward Amir</td>
                                <!-- <td>@12345678</td> -->
                                <td>
                                    <button
                                        @click="
                                            setPassword('ward_amir@gmail.com')
                                        "
                                        class="btn btn-outline-info"
                                    >
                                        Login
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Unit Amir</td>
                                <!-- <td>@12345678</td> -->
                                <td>
                                    <button
                                        @click="
                                            setPassword('unit_amir@gmail.com')
                                        "
                                        class="btn btn-outline-info"
                                    >
                                        Login
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from "./Layout/Layout.vue";
export default {
    components: { Layout },

    data() {
        return {
            loading: false,
            showPassword: false,
            passwordError: false,
        };
    },

    methods: {
        LoginSubmitHandler: async function () {
            try {
                this.loading = true;
                let formData = new FormData(event.target);
                let response = await axios.post("/user/login", formData);
                console.log(response);

                if (response?.status === 200) {
                    let data = response.data;
                    if (data.access_token) {
                        window.s_alert("Login Successfully");
                        localStorage.setItem("token", data.access_token);
                        localStorage.setItem("role", data.user?.role);
                        let prevurl =
                            sessionStorage.getItem("prevurl") || "/dashboard";
                        switch (data.user?.role) {
                            case 6:
                                console.log("unit");
                                window.location.href =
                                    "/dashboard/unit#" + prevurl;
                                break;
                            case 5:
                                console.log("ward");
                                window.location.href =
                                    "/dashboard/ward#" + prevurl;
                                break;
                            case 4:
                                console.log("thana");
                                window.location.href =
                                    "/dashboard/thana#" + prevurl;
                                break;
                            case 2:
                                console.log("admin");
                                window.location.href =
                                    "/dashboard/admin#" + prevurl;
                                break;
                            default:
                                console.log("default");
                                window.location.href = prevurl;
                                break;
                        }
                    }
                }
            } catch (error) {
                console.error("Login error", error);
            } finally {
                this.loading = false;
            }
        },
        setPassword(email) {
            let target = document.querySelector('[name="email"]');
            target.value = email;
        },
    },
};
</script>

<style scoped>
.top-33 {
    top: 33% !important;
}
</style>

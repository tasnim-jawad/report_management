import moment from "moment";
import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.axios.defaults.headers.common[
    "Authorization"
] = `Bearer ${window.localStorage?.token}`;
axios.defaults.baseURL = location.origin + "/api/v1/";

async function setToken(config = {}) {
    let token = localStorage.getItem("token");

    if (!token) {
        localStorage.removeItem("token");
        return (location.href = "/login");
    }
    config.headers.set(
        "Authorization",
        `Bearer ${localStorage.getItem("token")}`
    );
    // await window.cookieStore
    //     .get("AXRF-TOKEN")
    //     .then((cookie) => {
    //         // console.log('token set');
    //         // if (!cookie) {
    //         //     return location.href = '/login'
    //         // }
    //         // config.headers.set('Authorization', `Bearer ${cookie.value}`);
    //     })
    //     .catch((err) => {
    //         console.log(err);
    //     });
}

axios.interceptors.request.use(
    async function (config) {
        await setToken(config);

        $(".loader_body").addClass("active");
        $(".loader_body").css({ top: $(".main_content").scrollTop() });
        $("#backend_body .main_content").css({ overflowY: "hidden !mportant" });
        $("form button").prop("disabled", true);
        // Pace?.restart();
        window.count_left_time_sec = 1;
        sessionStorage.setItem(
            "last_time",
            moment().format("DD/MM/YYYY HH:mm:ss")
        );
        localStorage.setItem("last_time", new moment());
        return {
            ...config,
            // onUploadProgress,
            // onDownloadProgress,
        };
    },
    function (error) {
        // Do something with request error
        console.log("request error");
        return Promise.reject(error);
    }
);

window.remove_form_action_classes = function () {
    $(".loader_body").removeClass("active");
    $("input,select,textarea").removeClass("border-danger");
    $("form button").prop("disabled", false);
    $(`.text-danger`).remove();
};

// window.errorReset = function (event) {
//     console.log(event.target)
// }

function errorReset(event) {
    console.log(event.target);
}

window.render_form_errors = function (object, selector = "name") {
    for (const key in object) {
        if (Object.hasOwnProperty.call(object, key)) {
            const element = object[key];
            // console.log("resss",element);
            let el = document.querySelector(`input[${selector}="${key}`);
            if (!el) {
                el = document.getElementById(`${key}`);
            }

            /**
             *  if html element found then take action
             */
            if (el) {
                $(
                    `<div class="text-danger mt-1">${element[0]}</div>`
                ).insertAfter(el);
                el.classList.add("border-danger");
            }
        }
    }
};

window.axios.interceptors.response.use(
    (response) => {
        remove_form_action_classes();
        return response;
    },
    (error) => {
        remove_form_action_classes();
        let object = error.response?.data?.errors;
        render_form_errors(object);

        if (typeof error?.response?.data === "string") {
            console.log(
                "error",
                error?.response?.data ? error?.response?.data : error.response
            );
        } else {
            console.log(error.response || error);
            if (
                error.response?.data?.status == "server_error" ||
                error.response?.status === 500 ||
                error.response?.status === 403
            ) {
                console.log(error.response.data.message);
                window.s_warning(error.response.data.message);
            }
            if (error.response?.data?.status == "error") {
                // window.s_error(error.response.data.message);
                window.toaster(error.response.data.message, "error");
            }
            if (error.response?.status == 401) {
                location.href = "/login";
            }

            if (Object.keys(error.response?.data?.errors).length) {
                var object_2 = error.response?.data?.errors;
                console.log(object_2);
                for (const key in error.response?.data?.errors) {
                    if (Object.hasOwnProperty.call(object_2, key)) {
                        const element = object_2[key];
                        // console.log(element[0],element);
                        window.s_error(element[0], "error");
                    }
                }
            } else if (error.response?.data?.message) {
                window.toaster(error.response.data.message, "error");
            } else {
                window.toaster("Faild!! Something is wrong.", "error");
            }
        }

        // if(error.response.status == 401){
        //     window.clear_session();
        // }
        console.log(error);
        // let status = error.response.status;
        // window.s_alert('error '+status+': '+error.response?.statusText,'error')
        throw error;
    }
);

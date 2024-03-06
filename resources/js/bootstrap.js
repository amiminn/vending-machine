import AES from "crypto-js/aes";
import enc from "crypto-js/enc-utf8";
import JsCookie from "js-cookie";
import axios from "axios";

window.jsc = JsCookie;

window.encryptData = function (data) {
    try {
        return AES.encrypt(data, window.Laravel.app_key).toString();
    } catch (error) {
        console.error("harap ubah json ke string");
    }
};

window.decryptData = function (data) {
    return AES.decrypt(data, window.Laravel.app_key).toString(enc);
};

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["X-CSRF-TOKEN"] = window.Laravel.csrfToken;
try {
    // window.axios.defaults.headers.common["Authorization"] =
    //     "Bearer " + Auth.token;
} catch (error) {}

import _ from "lodash";

window._ = _;

String.prototype.isMatch = function (s) {
    return this.match(s) !== null;
};

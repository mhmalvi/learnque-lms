require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";
import CopyWrite from "./components/CopyWrite.vue";
import LoginComponent from "./components/Auth/Users/LoginComponent.vue";

const app = createApp({});

axios.defaults.baseURL = document.head.querySelector(
    'meta[name="api-base-url"]'
).content;

/**
 * Guest
 */
app.component("copy-write", CopyWrite);
app.component("login-component", LoginComponent);

app.use(store).mount("#app");

require("alpinejs");

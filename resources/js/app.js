require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";
import HelloWorld from "./components/HelloWorld.vue";

const app = createApp({});

axios.defaults.baseURL = document.head.querySelector(
    'meta[name="api-base-url"]'
).content;

app.component("hello-world", HelloWorld);

app.use(store).mount("#app");

require("alpinejs");

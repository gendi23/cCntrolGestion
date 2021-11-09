import axios from "axios";
import Vue from "vue";

const $eventBus = new Vue();
Vue.prototype.$eventBus = $eventBus;

const production = false;

const baseURL = production 
    ? ""
    : "http://localhost:8000/api"

const repository = axios.create({
    baseURL
});

export default repository;
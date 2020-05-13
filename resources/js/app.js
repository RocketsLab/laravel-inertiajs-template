require('./bootstrap');

import Vue from 'vue'
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import { InertiaApp } from "@inertiajs/inertia-vue"
import VueAWN from "vue-awesome-notifications"
import VTooltip from 'v-tooltip'

Vue.config.productionTip = false;
Vue.mixin({
    methods: {
        route: window.route
    }
})
Vue.use(VTooltip)
Vue.use(InertiaApp)
Vue.use(PortalVue)
Vue.use(VueMeta)
Vue.use(VueAWN, {
    position: 'top-right',
    durations: {
        global: 4500
    },
    icons: {
        prefix: "<span class='material-icons'>",
        suffix: "</span>",
        tip: 'help_outline',
        info: '',
        success: 'check_circle_outline',
        warning: 'error_outline',
        alert: 'highlight_off',
        async: 'update',
        confirm: 'feedback'
    }
})

let app = document.getElementById('app');

new Vue({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - Laravel Inertia App` : 'Laravel Inertia App'
    },
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
        },
    }),
}).$mount(app)

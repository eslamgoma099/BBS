require('./bootstrap');

window.Vue = require('vue').default;

import Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css'


Vue.component('system_update', require('./components/Update.vue').default);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('deposit', require('./components/Deposit.vue').default);
Vue.component('activate_plan', require('./components/ActivatePlan.vue').default);
Vue.component('profile', require('./components/Profile.vue').default);
Vue.component('user_profile', require('./components/UserProfile.vue').default);
Vue.component('add_account', require('./components/AddAccount.vue').default);
Vue.component('add_wire_account', require('./components/AddWireAccount.vue').default);
Vue.component('trade_station', require('./components/TradeStation.vue').default);
Vue.component('order_book_all', require('./components/OrderBookAll.vue').default);
Vue.component('order_book', require('./components/OrderBook.vue').default);
Vue.component('trade_history', require('./components/TradeHistory.vue').default);
Vue.component('trade_footer', require('./components/TradeFooter.vue').default);
Vue.component('all_assets', require('./components/Assets.vue').default);
Vue.component('update_user', require('./components/updateUser.vue').default);



Vue.component('dropzone', Dropzone);



const app = new Vue({
    el: '#app_secret',

    data (){
        return {
            bal : 0,
        }
    },
    mounted() {
        console.log('root mounted')
    },
    methods : {

        getBal(){
            axios.get('/api/user/balance').then((res) => {
                this.bal = res.data;
            })
        },
    }
});

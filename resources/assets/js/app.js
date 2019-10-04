
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: []
    },
    mounted() {
        this.fetchMessage();
        Echo.private('chat')
            .listen('MesssageSentEvent', (e) =>{
                this.message.push({
                    message: e.message.message,
                    user: e.user
                })
            })
    },
    methods: {
        addMessage(message) {
            this.message.push(message)
            axios.post('/messages', message).then(response => {
                //
            })
        },
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.message = response.data
            })
        }
    }
});

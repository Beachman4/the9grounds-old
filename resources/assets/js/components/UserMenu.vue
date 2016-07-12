<template>
    <li v-if="loggedIn" class="nav-item" style="margin-left: 15px;"><a class="nav-link" href="/logout">Logout</a></li>
    <li v-if="!loggedIn" class="nav-item" style="margin-left: 15px;"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
    <li v-if="!loggedIn" class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
</template>

<script>
    export default {
        data() {
            return {
                loggedIn: false
            }
        },
        ready() {
            this.checkLogin();
        },
        methods: {
            checkLogin: function()
            {
                this.$http.get('/api/checkLogin').then(function(response) {
                    if (response.text() == "true") {
                        this.$set('loggedIn', true);
                    } else {
                        this.$set('loggedIn', false);
                    }
                });
            }
        },
        events: {
            loggedIn: function(data) {
                if (data) {
                    this.checkLogin();
                }
            }
        }
    }
</script>
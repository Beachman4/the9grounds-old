<template>
    <div class="modal" id="createWebsiteModal" tabindex="-1" role="dialog" aria-labelledby="createWebsiteModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createWebsiteModalLabel" style="color: black;">Create Website</h4>
                </div>
                <div class="modal-body">
                    <div v-if="!loggedIn">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h5>You need to login to an Account first!</h5>
                            </div>
                        </div>
                        <div class="row" v-if="register">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h5>Register</h5>
                                    </div>
                                </div>
                                <div class="alert alert-danger" v-if="registerFailedMessage != ''">
                                    <h5>Something went wrong!</h5>
                                    <p>{{ registerFailedMessage }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div :class="['form-group', registerData.email.failed ? 'has-danger' : '']">
                                            <label class="form-control-label" for="email">Email Address</label>
                                            <input type="email" class="form-control form-control-danger" name="email" id="email" v-model="registerData.email.value">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div :class="['form-group', registerData.username.failed ? 'has-danger': '']">
                                            <label class="form-control-label" for="username">Username</label>
                                            <input type="text" class="form-control form-control-danger" name="username" id="username" v-model="registerData.username.value">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div :class="['form-group', registerData.password.failed ? 'has-danger' : '']">
                                            <label class="form-control-label" for="password_register_modal">Password</label>
                                            <input type="password" class="form-control form-control-danger" name="password" id="password_register_modal" v-model="registerData.password.value">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div :class="['form-group', registerData.confirm_password.failed ? 'has-danger' : '']">
                                            <label class="form-control-label" for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control form-control-danger" name="confirm_password" id="confirm_password" v-model="registerData.confirm_password.value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-primary" @click="changeRegister">Login</button>
                                            <button type="button" class="btn btn-outline-success" @click="registerSend">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h5>Login</h5>
                                    </div>
                                </div>
                                <div class="alert alert-danger" v-if="loginFailedMessage != ''">
                                    <h5>Something went wrong!</h5>
                                    <p>{{ loginFailedMessage }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div :class="['form-group', loginData.username_email.failed ? 'has-danger' : '']">
                                            <label class="form-control-label" for="username_email">Email or Username</label>
                                            <input type="text" class="form-control form-control-danger" name="username_email" id="username_email" v-model="loginData.username_email.value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div :class="['form-group', loginData.password.failed ? 'has-danger' : '']">
                                            <label class="form-control-label" for="password">Password</label>
                                            <input type="password" class="form-control form-control-danger" name="password" id="password" v-model="loginData.password.value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-primary" @click="changeRegister">Register</button>
                                            <button type="button" class="btn btn-outline-success" @click="loginSend">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="loggedIn && !websiteCreated">
                        <div class="col-lg-12">
                            <div class="row" v-if="!websiteCreated && websiteFailedMessage != ''">
                                <div class="col-lg-12 text-lg-center">
                                    <div class="alert alert-danger">
                                        <h5>Something went wrong</h5>
                                        <p>{{ websiteFailedMessage }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div :class="['form-group', websiteData.name.failed ? 'has-danger' : websiteData.domain.tooshort ? 'has-danger' : '']">
                                        <label class="form-control-label" for="name">Website Name</label>
                                        <label class="form-control-label" for="name" v-if="websiteData.name.tooshort">Website Name must be greater than 3 characters.</label>
                                        <input type="text" class="form-control form-control-danger"  name="name" v-model="websiteData.name.value" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div :class="['form-group', websiteNameTaken ? 'has-danger' : websiteData.domain.failed ? 'has-danger' : websiteData.domain.tooshort ? 'has-danger' : '']">
                                        <label class="form-control-label" for="domain">Website Domain</label>
                                        <p style="color: red" v-if="websiteData.domain.value != '' && websiteNameTaken">Website name is unavailable.</p>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-question" v-if="websiteData.domain.value.length <= 3"></i><i class="fa fa-check" style="color: green" v-if="websiteData.domain.value.length > 3 && !websiteNameTaken"></i><i style="color: red;" class="fa fa-times-circle" v-if="websiteNameTaken"></i></span>
                                            <input type="text" class="form-control form-control-danger" name="domain" id="domain" v-model="websiteData.domain.value" v-on:keyup="checkDomain">
                                            <span class="input-group-addon">.the9grounds.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="websiteCreated">
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                <h5>You're all done!</h5>
                                <p>Your website is now created.  Please click the link below to go to it.</p>
                            </div>
                            <button type="button" @click="goToWebsite" class="btn btn-outline-primary">Go To Website</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                        <button type="button" @click="createWebsite" v-if="loggedIn" class="btn btn-outline-success" :disabled="websiteButton">Create Website</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            websiteButton: function() {
                if (this.websiteNameTaken) {
                    return true;
                } else if (this.websiteData.name.value == "" || this.websiteData.domain.value == "") {
                    return true;
                } else if (this.websiteData.name.value.lenght < 3 || this.websiteData.domain.value.length < 3) {
                    return true;
                } else {
                    return false;
                }
            }
        },
        data() {
            return {
                loggedIn: false,
                register: false,
                registerFailedMessage: "",
                loginFailedMessage: "",
                loginData: {
                    username_email: {
                        value: "",
                        failed: false
                    },
                    password: {
                        value: "",
                        failed: false
                    },
                },
                registerData: {
                    email: {
                        value: "",
                        failed: false
                    },
                    username: {
                        value: "",
                        failed: false
                    },
                    password: {
                        value: "",
                        failed: false
                    },
                    confirm_password: {
                        value: "",
                        failed: false
                    }
                },
                websiteData: {
                    name: {
                        value: "",
                        failed: false,
                        tooshort: false,
                    },
                    domain: {
                        value: "",
                        failed: false,
                        tooshort: false,
                    }
                },
                websiteNameTaken: false,
                websiteCreated: false,
                websiteFailedMessage: ""
            }
        },
        ready() {
            this.checkLogin();
        },
        methods: {
            goToWebsite: function() {
                window.location.href = "http://" + this.websiteData.domain.value + ".the9grounds.com";
            },
            createWebsite: function() {
                if (!this.checkWebsiteData()) {
                    this.$http.post('/api/website', this.websiteData).then(function(response) {
                        if (response.text() == "") {
                            this.$set('websiteCreated', true);
                        } else {
                            this.$set('websiteFailedMessage', response.text());
                            this.$set('websiteCreated', false);
                        }
                    });
                }
            },
            checkWebsiteData: function() {
                var failed = false;
                if (this.websiteData.name.value == "") {
                    failed = true;
                    this.websiteData.name.failed = true;
                } else {
                    this.websiteData.name.failed = false;
                }
                if (this.websiteData.domain.value == "") {
                    failed = true;
                    this.websiteData.domain.failed = true;
                } else {
                    this.websiteData.domain.failed = false;
                }
                if (this.websiteData.name.value.length <= 3) {
                    failed = true;
                    this.websiteData.name.tooshort = true;
                    this.websiteData.name.failed = true;
                } else {
                    this.websiteData.name.tooshort = false;
                    this.websiteData.name.failed = false;
                }
                if (this.websiteData.domain.value.length <= 3) {
                    failed = true;
                    this.websiteData.domain.tooshort = true;
                    this.websiteData.domain.failed = true;
                } else {
                    this.websiteData.domain.tooshort = false;
                    this.websiteData.domain.failed = false;
                }
                return failed;
            },
            checkDomain: function() {
                if (this.websiteData.domain.value.length > 3) {
                    this.$http.post('/api/checkDomain', this.websiteData).then(function (response) {
                        if (response.text() == "taken") {
                            this.$set('websiteNameTaken', true);
                        } else {
                            this.$set('websiteNameTaken', false);
                        }
                    });
                }
            },
            checkLogin: function() {
                this.$http.get('/api/checkLogin').then(function(response) {
                    if (response.text() == "true") {
                        this.$set('loggedIn', true);
                    } else {
                        this.$set('loggedIn', false);
                    }
                });
            },
            changeRegister: function() {
                return this.register = ! this.register;
            },
            registerSend: function() {
                if (!this.checkRegisterData()) {
                    this.$http.post('/api/register', this.registerData).then(function(response) {
                        if (response.text() == "") {
                            this.$dispatch('loggedIn', true);
                            this.$set('loggedIn', true);
                        } else {
                            this.$set('registerFailedMessage', response.json());
                        }
                    });
                }
            },
            loginSend: function() {
                if (!this.checkLoginData()) {
                    console.log("send");
                    this.$http.post('/api/login', this.loginData).then(function(response) {
                        console.log(response);
                        if (response.text() == '') {
                            this.$dispatch('loggedIn', true);
                            this.$set('loggedIn', true);
                        } else {
                            this.$set('loginFailedMessage', response.json());
                        }
                    });
                } else {
                    console.log("failed");
                }
            },
            checkLoginData: function() {
                var failed = false;
                if (this.loginData.username_email.value == "") {
                    failed = true;
                    this.loginData.username_email.failed = true;
                } else {
                    this.loginData.username_email.failed = false;
                }
                if (this.loginData.password.value == "") {
                    failed = true;
                    this.loginData.password.failed = true;
                } else {
                    this.loginData.password.failed = false;
                }
                return failed;
            },
            checkRegisterData: function() {
                var failed = false;
                if (this.registerData.email.value == "") {
                    failed = true;
                    this.registerData.email.failed = true;
                } else {
                    this.registerData.email.failed = false;
                }
                if (this.registerData.username.value == "") {
                    failed = true;
                    this.registerData.username.failed = true;
                } else {
                    this.registerData.username.failed = false;
                }
                if (this.registerData.password.value == "") {
                    failed = true;
                    this.registerData.password.failed = true;
                } else {
                    this.registerData.password.failed = false;
                }
                if (this.registerData.confirm_password.value == "") {
                    failed = true;
                    this.registerData.confirm_password.failed = true;
                } else {
                    this.registerData.confirm_password.failed = false;
                }
                return failed;
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
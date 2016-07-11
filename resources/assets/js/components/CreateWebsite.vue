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
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label for="email"></label>
                                            <input type="email" class="form-control" name="email" id="email" v-model="registerData.email.value">
                                            <div v-if="registerData.email.failed" class="validation-alert"><span>Required</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" v-model="registerData.username.value">
                                            <div v-if="registerData.username.failed" class="validation-alert"><span>Required</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label for="password"></label>
                                            <input type="password" class="form-control" name="password" id="password" v-model="registerData.password.value">
                                            <div v-if="registerData.password.failed" class="validation-alert"><span>Required</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label for="confirm_password"></label>
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" v-model="registerData.confirm_password.value">
                                            <div v-if="registerData.confirm_password.failed" class="validation-alert"><span>Required</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success" @click="registerSend">Register</button>
                                            <button type="button" class="btn btn-default" @click="changeRegister">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label for="username_email">Email or Username</label>
                                            <input type="text" class="form-control" name="username_email" id="username_email" v-model="loginData.username_email.value">
                                            <div v-if="loginData.username_email.failed" class="validation-alert"><span>Required</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label for="password"></label>
                                            <input type="password" class="form-control" name="password" id="password" v-model="loginData.password.value">
                                            <div v-if="loginData.password.failed" class="validation-alert"><span>Required</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success" @click="loginSend">Login</button>
                                            <button type="button" class="btn btn-default" @click="changeRegister">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="loggedIn">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name"></label>
                                        <input type="text" class="form-control" name="name" v-model="websiteData.name.value" id="name">
                                        <div v-if="websiteData.name.failed" class="validation-alert"><span>Required</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="domain"></label>
                                        <input type="text" class="form-control" name="domain" id="domain" v-model="websiteData.domain.value">
                                        <div v-if="loginData.password.failed" class="validation-alert"><span>Required</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                        <button type="button" @click="createWebsite" v-if="loggedIn" class="btn btn-success">Create Website</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loggedIn: false,
                register: true,
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
                        failed: false
                    },
                    domain: {
                        value: "",
                        failed: false
                    }
                }
            }
        },
        ready() {
            this.checkLogin();
        },
        methods: {
            checkLogin: function() {
                this.$http.get('/api/checkLogin').then(function(response) {
                    if (response == "true") {
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
                if (this.checkRegisterData()) {

                }
            },
            loginSend: function() {
                if (this.checkLoginData()) {

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
        }
    }
</script>
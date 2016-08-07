<template>
    <div class="modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registerModalLabel" style="color: black;">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="row" v-if="registerMessage != ''">
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <h5>Something went wrong.</h5>
                                <p>{{ registerMessage }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="!registerDone">
                        <div class="col-lg-12 text-center">
                            <div :class="['form-group', registerData.email.failed ? 'has-danger' : registerData.email.tooshort ? 'has-danger' : '']">
                                <label for="email" class="form-control-label">Email Address</label>
                                <input type="email" class="form-control danger" name="email" v-model="registerData.email.value" id="email">
                                <small v-if="registerData.email.tooshort" class="form-control-label">Email must be more than 5 characters</small>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div :class="['form-group', registerData.username.failed ? 'has-danger' : registerData.username.tooshort ? 'has-danger' : '']">
                                <label for="username" class="form-control-label">Username</label>
                                <input type="text" class="form-control form-control-danger" name="username" v-model="registerData.username.value" id="username">
                                <small v-if="registerData.username.tooshort" class="form-control-label">Username must be more than 5 characters</small>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div :class="['form-group', registerData.password.failed ? 'has-danger' : registerData.password.tooshort ? 'has-danger' : '']">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" class="form-control form-control-danger" name="password" v-model="registerData.password.value" id="password">
                                <small v-if="registerData.password.tooshort" class="form-control-label">Password must be more than 5 characters</small>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div :class="['form-group', registerData.confirm_password.failed ? 'has-danger' : registerData.confirm_password.tooshort ? 'has-danger' : '']">
                                <label for="confirm_password" class="form-control-label">Confirm Password</label>
                                <input type="password" class="form-control form-control-danger" name="confirm_password" v-model="registerData.confirm_password.value" id="confirm_password">
                                <small v-if="registerData.confirm_password.tooshort" class="form-control-label">Confirm Password must be more than 5 characters</small>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                <h5>Account created!</h5>
                                <p>Please head over to your email and confirm your account.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                        <button v-if="!registerDone" data-toggle="modal" @click="hideRegister" data-target="#loginModal" type="button" class="btn btn-outline-info">Login</button>
                        <button v-if="!registerDone" type="button" @click="register" class="btn btn-outline-success">Register</button>
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
                registerData: {
                    email: {
                        value: "",
                        failed: false,
                        tooshort: false,
                    },
                    username: {
                        value: "",
                        failed: false,
                        tooshort: false,
                    },
                    password: {
                        value: "",
                        failed: false,
                        tooshort: false,
                    },
                    confirm_password: {
                        value: "",
                        failed: false,
                        tooshort: false,
                    }
                },
                registerMessage: "",
                failed: false,
                registerDone: false
            }
        },
        methods: {
            hideRegister: function() {
                $('#registerModal').modal('hide');
            },
            register: function() {
                if (!this.checkData()) {
                    this.$http.post('/api/register', this.registerData).then(function(response) {
                        if (response.text() != "") {
                            this.$set('registerMessage', response.text());
                            this.$set('registerDone', false);
                        } else {
                            this.$set('registerDone', true);
                        }
                    });
                }
            },
            checkData: function() {
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
                if (this.registerData.email.value.length < 5) {
                    failed = true;
                    this.registerData.email.tooshort = true;
                    this.registerData.email.failed = true;
                } else {
                    this.registerData.email.tooshort = false;
                    this.registerData.email.failed = false;
                }
                if (this.registerData.username.value.length < 5) {
                    failed = true;
                    this.registerData.username.tooshort = true;
                    this.registerData.username.failed = true;
                } else {
                    this.registerData.username.tooshort = false;
                    this.registerData.username.failed = false;
                }
                if (this.registerData.password.value.length < 5) {
                    failed = true;
                    this.registerData.password.tooshort = true;
                    this.registerData.password.failed = true;
                } else {
                    this.registerData.password.tooshort = false;
                    this.registerData.password.failed = false;
                }
                if (this.registerData.confirm_password.value.length < 5) {
                    failed = true;
                    this.registerData.confirm_password.tooshort = true;
                    this.registerData.confirm_password.failed = true;
                } else {
                    this.registerData.confirm_password.tooshort = false;
                    this.registerData.confirm_password.failed = false;
                }
                return failed;
            }
        }
    }
</script>
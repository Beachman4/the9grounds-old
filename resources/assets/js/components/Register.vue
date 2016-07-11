<template>
    <div class="modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registerModalLabel" style="color: black;">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <label>Email Address
                                <input type="email" class="form-control" name="email" v-model="registerData.email.value">
                                <div v-if="registerData.email.failed" class="validation-alert"><span>Required</span></div>
                            </label>
                        </div>
                        <div class="col-lg-12 text-center">
                            <label>Username
                                <input type="text" class="form-control" name="username" v-model="registerData.username.value">
                                <div v-if="registerData.username.failed" class="validation-alert"><span>Required</span></div>
                            </label>
                        </div>
                        <div class="col-lg-12 text-center">
                            <label>Password
                                <input type="password" class="form-control" name="password" v-model="registerData.password.value">
                                <div v-if="registerData.password.failed" class="validation-alert"><span>Required</span></div>
                            </label>
                        </div>
                        <div class="col-lg-12 text-center">
                            <label>Confirm Password
                                <input type="password" class="form-control" name="confirm_password" v-model="registerData.confirm_password.value">
                                <div v-if="registerData.confirm_password.failed" class="validation-alert"><span>Required</span></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                        <button data-toggle="modal" @click="hideRegister" data-target="#loginModal" type="button" class="btn btn-info">Login</button>
                        <button type="button" @click="register" class="btn btn-success">Register</button>
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
                failed: false
            }
        },
        methods: {
            hideRegister: function() {
                $('#registerModal').modal('hide');
            },
            register: function() {
                if (this.checkData()) {

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
                return failed;
            }
        }
    }
</script>
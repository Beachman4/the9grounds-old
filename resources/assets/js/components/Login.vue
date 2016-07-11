<template>
    <div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="LoginModalLabel" style="color: black;">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <label>Email or Username
                                <input type="text" class="form-control" name="username_email" v-model="loginData.username_email.value">
                                <div v-if="loginData.username_email.failed" class="validation-alert"><span>Required</span></div>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <label>Password
                                <input type="password" class="form-control" name="password" v-model="loginData.password.value">
                                <div v-if="loginData.password.failed" class="validation-alert"><span>Required</span></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                        <button data-toggle="modal" @click="hideLogin" data-target="#registerModal" type="button" class="btn btn-info">Register</button>
                        <button type="button" @click="login" class="btn btn-success">Login</button>
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
                loginData: {
                    username_email: {
                        value: "",
                        failed: false
                    },
                    password: {
                        value: "",
                        failed: false
                    },
                }
            }
        },
        methods: {
            hideLogin: function() {
                $('#loginModal').modal('hide');
            },
            login: function() {
                if (this.checkData()) {

                }
            },
            checkData: function() {
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
            }
        }
    }
</script>
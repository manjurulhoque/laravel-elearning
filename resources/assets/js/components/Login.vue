<template>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
                <h5 class="text-uppercase text-center">Login</h5>
                <br><br>
                <form>
                    <ul class="alert alert-danger">
                        <p class="text-center">
                        </p>
                    </ul>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="form-group flexbox py-10">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Remember me</span>
                        </label>

                        <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-bold btn-block btn-primary" type="button">Login
                        </button>
                    </div>
                </form>
                <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a href="#">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

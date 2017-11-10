<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Update Profile
                    </div>
                    <div class="panel-body">
                        <form>
                          <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input v-model="user.name" type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <a href="#">Change Password</a>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary pull-right">Save Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
          return {
            user: {}
          }
        },
        mounted() {
          axios.get('/lapi/user').then(response => {
            this.user = response.data
            console.log(this.user)
          }).catch(e => {
            this.errors.push(e)
          })
        }
    }
</script>

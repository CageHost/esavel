<template>
  <div v-if="hasData">
    <div v-if="user.name != null">
      <DefaultLayout user="user">
        <router-view></router-view>
      </DefaultLayout>
    </div>
    <div v-else>
      <GuestLayout>
        <router-view></router-view>
      </GuestLayout>
    </div>
  </div>
</template>

<script>
import DefaultLayout from './layouts/DefaultLayout.vue'
import GuestLayout from './layouts/GuestLayout.vue'

export default {
  data() {
    return {
      hasData: false,
      user: {}
    }
  },
  components:{
    DefaultLayout: DefaultLayout,
    GuestLayout: GuestLayout
  },
  watch: {
    // TODO: move user data to <head>
    '$route.path': function (path) {
      axios.get('/lapi/user').then(response => {
        this.user = response.data
        this.hasData = true
      }).catch(error => {
        console.log(error)
        this.hasData = true
      })
    }
  },
  beforeCreate() {
    // TODO: DRY noob
    axios.get('/lapi/user').then(response => {
      this.user = response.data
      this.hasData = true
    }).catch(error => {
      console.log(error)
      this.hasData = true
    })
  }
}
</script>

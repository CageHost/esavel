<template>
    <div class="container profile">
        <div class="row">
          <div class="col-sm-4">
            <img class="card-img-top" :src="event.avatar" alt="Logo">
          </div>
          <div class="col-sm-8">
            <h1 class="title-name">{{event.name}}</h1>
            <p>{{event.description}}</p>
          </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
      props: ['alias'],
      data() {
        return {
          event: []
        }
      },
      mounted() {
        axios.get('/lapi/events/' + this.$props.alias).then(response => {
          this.event = response.data
        }).catch(e => {
          this.errors.push(e)
        })
      }
  }
</script>

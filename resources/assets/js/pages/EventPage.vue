<template>
  <div>
    <EventComponent :event="event"/>
  </div>
</template>

<script>
  import EventComponent from '../components/EventComponent';

  export default {
    components:{
      EventComponent: EventComponent
    },
    data() {
      return {
        event: {}
      }
    },
    mounted() {
      axios.get('/lapi/event/' + this.$route.params.id).then(response => {
        console.log(response.data)
        this.event = response.data
      }).catch(e => {
        this.errors.push(e)
        debugger
      })
    }
  }
</script>

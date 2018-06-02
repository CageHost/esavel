<template>
  <EventsComponent :events="this.events"/>
</template>

<script>
  import EventsComponent from '../components/EventsComponent';

  export default {
    components:{
      EventsComponent: EventsComponent
    },
    data() {
      return {
        events: []
      }
    },
    mounted() {
      axios.get('/lapi/events').then(response => {
        console.log(response.data)
        this.events = response.data
      }).catch(e => {
        this.errors.push(e)
      })
    }
  }
</script>

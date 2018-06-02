<template>
          <div class="md-layout md-gutter">
          <div v-for="event in events">
            <EventComponent :id="event.id"/>
          </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'

  import EventComponent from './EventComponent';

  export default {
      components:{
        EventComponent: EventComponent
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

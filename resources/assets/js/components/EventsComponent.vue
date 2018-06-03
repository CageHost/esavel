<template>
    <div class="md-layout md-gutter">
      <div v-for="event in events">
        <EventCard :event="event"/>
      </div>
    </div>
</template>

<script>
  import axios from 'axios'

  import EventCard from './EventCard';

  export default {
    components:{
      EventCard: EventCard
    },
    props: ['events'],
    mounted() {
      console.log('erdep')
    }
  }
</script>

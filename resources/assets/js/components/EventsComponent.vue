<template>
    <div class="md-layout md-gutter">
      <EventCard :key="event.id" :event="event" v-for="event in events"/>
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

<template>
    <div class="md-layout md-gutter">
      <div v-for="event in events">
        <EventComponent :event="event"/>
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
    props: ['events'],
    mounted() {
      console.log('did')
    }
  }
</script>

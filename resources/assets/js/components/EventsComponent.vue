<template>
    <div class="container">
        <div class="row">
          <div v-for="event in events" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-6">
                      <a :href="'/events/'+ event.alias">{{event.name}}</a>
                    </div>
                    <div class="col-md-6 text-right">
                      {{event.location}}
                      {{event.date}} {{event.time}}
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <div v-for="type in event.types" class="text-right">
                    <h5>{{type.name}}</h5>
                  </div>
                  <p>{{event.description}}</p>
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
          events: []
        }
      },
      mounted() {
        axios.get('/lapi/events').then(response => {
          this.events = response.data
        }).catch(e => {
          this.errors.push(e)
        })
      }
  }
</script>

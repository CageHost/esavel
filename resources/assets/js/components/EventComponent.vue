<template>
  <div class="md-layout-item">
    <md-card md-with-hover>
      <md-card-area md-inset>
        <md-card-media>
          <img class="card-img-top" :src="event.background" alt="Background">
        </md-card-media>
        <md-card-header>
          <md-avatar>
            <img class="card-img-top" :src="event.avatar" alt="Avatar">
          </md-avatar>
          <div class="md-title">{{event.name}}</div>
          <div class="md-subhead">{{eventTypeName}}</div>
        </md-card-header>
      </md-card-area>

        <md-card-content>
          <div class="card-reservation">
            <md-icon>place</md-icon>{{event.location}}
            &nbsp;<md-icon>calendar_today</md-icon>{{event.date}}
            &nbsp;<md-icon>access_time</md-icon>{{event.time}}
          </div>
        </md-card-content>
        <md-card-expand>
          <md-card-actions md-alignment="space-between">
            <md-card-expand-trigger>
              <md-button class="">
                <md-icon>keyboard_arrow_down</md-icon>Description
              </md-button>
            </md-card-expand-trigger>
            <div>
              <md-button :to="'/event/'+event.alias" class="md-raised md-accent">Join</md-button>
            </div>
          </md-card-actions>

          <md-card-expand-content>
            <md-card-content>
              {{event.description}}
            </md-card-content>
          </md-card-expand-content>
        </md-card-expand>
      </md-card>
    </div>
    <!--
    <div class="container profile">
        <img class="card-img-top" :src="event.background" alt="Logo">
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
    -->
</template>

<style lang="scss" scoped>
  .md-layout-item {
    margin-top: 16px;
    margin-bottom: 16px;
  }

  .md-card {
    max-width: 320px;
    vertical-align: top;
  }
</style>

<script>
  export default {
    props: ['event'],
    computed: {
      eventTypeName: function () {
        const defaultEventType = 'General'
        const eventType = this.event.types[0] ? this.event.types[0].name : defaultEventType;
        return eventType;
      }
    }
    /*
    props: {
      'event': {
        name: 'shit',
        types: [{name: 'shit'}]
      }
    }
    */
  }
</script>

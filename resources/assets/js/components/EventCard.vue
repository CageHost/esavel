<template>
  <div class="md-layout-item md-large-size-33 md-medium-size-50 md-small-size-100">
    <md-card md-with-hover>
        <md-card-area md-inset>
          <md-ripple>
            <md-card-media>
              <img class="card-img-top" :src="event.background" alt="Background">
            </md-card-media>
          </md-ripple>
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
              <md-icon>place</md-icon>{{event.location}}<br>
              &nbsp;<md-icon>calendar_today</md-icon>{{event.date}}<br>
              &nbsp;<md-icon>access_time</md-icon>{{event.time}}<br>
              &nbsp;<md-icon>people</md-icon>15
            </div>
          </md-card-content>
          <md-card-expand>
            <md-card-actions md-alignment="space-between">
              <md-card-expand-trigger>
                <md-button>
                  <md-icon>keyboard_arrow_down</md-icon>Details
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
</template>

<style lang="scss" scoped>
  .md-layout-item {
    margin-top: 16px;
    margin-bottom: 16px;
  }

  .md-card {
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
  }
</script>

Vue.http.headers.common['X-CSRF-TOKEN'] = $('#csrf-token').attr('value');

var timepunchToday = new Vue({
  el: '#timepunch',

  data: {
    punches: [],
    tags: [],
    newPunch: {start: '', end: '', name: '', description: '', tags: []},
    tagInput: '',
    serverErrors: []
  },

  computed: {
    startUtc: function() {
      return this.parseUtcFromTime(this.newPunch.start);
    },
    endUtc: function() {
      return this.parseUtcFromTime(this.newPunch.end);
    },
    errors: function() {
      return this.startUtc == "" || ! this.newPunch.name;
    }
  },

  ready: function () {
    this.fetchTags();
    this.fetchPunches();
  },

  methods: {
    doSomething: function() {
      alert('doing something!');
    },
    fetchPunches: function () {
      this.$http.get('/api/v1/punch', function (response) {
        this.$set('punches', response.data);
      });
    },
    fetchTags: function () {
      this.$http.get('/api/v1/punchtags', function(response) {
        this.$set('tags', response.data);
      });
    },
    addTag: function(tagName) {
      var tag;
      this.tags.some(function(item){
        if(item.name == tagName) {
          tag = item;
          return true;
        }
      });

      if(tag) {
        if(this.newPunch.tags.indexOf(tag.id) === -1)
          this.newPunch.tags.push(tag.id);
        this.tagInput = '';
      } else {
        this.createTag(tagName);
      }
    },
    removeTag: function(tagId) {
      var index = this.newPunch.tags.indexOf(tagId);
      if(index > -1)
        this.newPunch.tags = this.newPunch.tags.splice(tagId);
    },
    createPunch: function(e) {
      e.preventDefault();
      this.serverErrors = [];

      var punch = Vue.util.extend({}, this.newPunch);

      punch.start = this.startUtc;
      punch.end = this.endUtc;

      if(punch.end === '')
        delete punch.end;

      this.tagInput = '';

      this.$http.post('api/v1/punch', punch, function(response){
        this.punches.push(response.data.item);
        this.newPunch = {start: '', end: '', name: '', description: '', tags: []};
      }).error(function(response, status, request){
        this.handleErrorResponse(response); // display these errors
      });
    },
    createTag: function(tagName) {
      this.serverErrors = [];
      this.$http.post('api/v1/punchtags', { name: tagName }, function(response) {
        this.tags.push(response.data.item);
        this.newPunch.tags.push(response.data.item.id);
        this.tagInput = '';
      }).error(function(response, status, request){
        this.handleErrorResponse(response); // display these errors
      });
    },
    parseUtcFromTime: function(timeString, format) {
      format = typeof format !== 'undefined' ? format : 'HH:mm';
      var utc = moment(timeString, format).tz('America/Chicago').format('X');
      return utc === "Invalid date" ? '' : utc;
    },
    handleErrorResponse: function(response) {
      var timePunch = this;

      $.each(response, function(index, messages){
        timePunch.serverErrors = timePunch.serverErrors.concat(messages);
      })
    }
  },
  filters: {
    formatTime: function (unixTimestamp) {
      if(unixTimestamp === null)
        return '';
      else
        return moment(unixTimestamp, 'X').tz('America/Chicago').format('HH:mm');
    },
    toTagName: function (id) {
      var name = 'unknown tag';
      this.tags.some(function (tag) {
        if (tag.id === id) {
          return name = tag.name;
        }
      });
      return name;
    }
  }
});

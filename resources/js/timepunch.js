Vue.http.headers.common['X-CSRF-TOKEN'] = $('#csrf-token').attr('value');

var timepunchToday = new Vue({
  el: '#timepunch',

  data: {
    punches: [],
    tags: [],
    newPunch: {start: '', end: '', name: '', description: '', tags: []},
    tagInput: ''
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

      if(tag)
        this.newPunch.tags.push(tag.id);
      else
        this.createTag(tagName);

      this.tagInput = '';
    },
    removeTag: function(tagId) {
      var index = this.newPunch.tags.indexOf(tagId);
      if(index > -1)
        this.newPunch.tags = this.newPunch.tags.splice(tagId);
    },
    createPunch: function(e) {
      e.preventDefault();

      this.newPunch.start = this.startUtc;
      this.newPunch.end = this.endUtc;

      var punch = Vue.util.extend({}, this.newPunch);

      this.$http.post('api/v1/punch', punch, function(response){
        this.punches.push(response.data.item);
      });

      this.newPunch = {start: '', end: '', name: '', description: '', tags: []};
      this.tagInput = '';
    },
    createTag: function(tagName) {
      this.$http.post('api/v1/punchtags', { name: tagName }, function(response) {
        this.tags.push(response.data.item);
        this.newPunch.tags.push(response.data.item.id);
      });
      this.tagInput = '';
    },
    parseUtcFromTime: function(timeString, format) {
      format = typeof format !== 'undefined' ? format : 'HH:mm';
      var utc = moment(timeString, format).tz('America/Chicago').format('X');
      return utc === "Invalid date" ? '' : utc;
    }
  },
  filters: {
    formatTime: function (unixTimestamp) {
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

Vue.http.headers.common['X-CSRF-TOKEN'] = $('#csrf-token').attr('value');

var timepunchToday = new Vue({
  el: '#timepunch',

  data: {
    punches: [],
    tags: [],
    newPunch: {start: '', end: '', name: '', description: '', tags: ''}
  },

  computed: {
    startUtc: function() {
      return moment(this.newPunch.start, 'HH:mm').format('X');
    },
    endUtc: function() {
      return moment(this.newPunch.end, 'HH:mm').format('X');
    },
    errors: function() {
      return this.startUtc == "Invalid date" || this.endUtc == "Invalid date" || ! this.newPunch.name
    }
  },

  ready: function () {
    this.fetchTags();
    this.fetchPunches();
  },

  methods: {
    fetchPunches: function () {
      this.$http.get('/api/v1/punch', function (response) {
        this.$set('punches', response.data);
      });
    },
    fetchTags: function () {
      this.$http.get('/api/v1/punchtags', function(response) {
        this.$set('tags', response.data);

        var that = this;
        Vue.nextTick(function() {
          $("#tags").select2({
            tags: true,
            placeholder: 'Tags'
          }).on('change', function () {
            that.newPunch.tags = $("#tags").select2('val');
          });
        });
      });
    },
    addPunch: function (e) {
      e.preventDefault();

      this.newPunch.start = this.startUtc;
      this.newPunch.end = this.endUtc;

      var punch = Vue.util.extend({}, this.newPunch);

      this.createPunch(punch);

      this.newPunch = {start: '', end: '', name: '', description: '', tags: ''};
      $("#tags").select2('val', '');
    },
    createPunch: function(punch) {
      this.$http.post('api/v1/punch', punch, function(response){
        this.punches.push(response.data.item);
      });
    }
  },
  filters: {
    formatTime: function (unixTimestamp) {
      return moment(unixTimestamp, 'X').format('HH:mm');
    },
    toTagNames: function (ids) {
      var arr = [];
      var that = this;
      ids.forEach(function(id) {
        that.tags.forEach(function (tag) {
          if (tag.id === id) arr.push(tag.name);
        });
      });
      return arr;
    }
  }
});

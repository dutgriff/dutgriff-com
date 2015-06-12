Vue.http.headers.common['X-CSRF-TOKEN'] = $('#csrf-token').attr('value');

var timepunchToday = new Vue({
  el: '#timepunch',

  data: {
    punches: [],
    tags: [],
    newPunch: {start: '', end: '', name: '', description: '', tags: ''},
    waitingToLoad: {fetchTags: false, fetchPunches: false}
},

  computed: {
    startUtc: function() {
      return moment(this.newPunch.start, 'HH:mm').tz('America/Chicago').format('X');
    },
    endUtc: function() {
      return moment(this.newPunch.end, 'HH:mm').tz('America/Chicago').format('X');
    },
    errors: function() {
      return this.startUtc == "Invalid date" || this.endUtc == "Invalid date" || ! this.newPunch.name
    }
  },

  ready: function () {
    var that = this;
    this.fetchTags(function(){that.waitingToLoad.fetchTags = true});
    this.fetchPunches(function(){that.waitingToLoad.fetchPunches = true});
    this.$watch('waitingToLoad.fetchTags && waitingToLoad.fetchPunches', function() {
      $.each(this.waitingToLoad, function(index, value) {
        if(! value)
          return 0;
      })
      this.addSelect2();
    });
  },

  methods: {
    fetchPunches: function (callback) {
      this.$http.get('/api/v1/punch', function (response) {
        this.$set('punches', response.data);
        if (typeof(callback) === "function") callback();
      });
    },
    fetchTags: function (callback) {
      this.$http.get('/api/v1/punchtags', function(response) {
        this.$set('tags', response.data);
        if (typeof(callback) === "function") callback();
      });
    },
    addSelect2: function() {
      $("#tags").select2({
        tags: true,
        placeholder: 'Tags'
      }).on('change', function () {
        this.newPunch.tags = $("#tags").select2('val');
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
      return moment(unixTimestamp, 'X').tz('America/Chicago').format('HH:mm');
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

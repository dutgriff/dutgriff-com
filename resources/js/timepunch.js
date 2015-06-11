new Vue({
  el: '#timepunch',

  data: {
    punches: [],
    tags: [],
    newPunch: {start: '', end: '', name: '', description: '', tags: ''}
  },

  ready: function () {
    this.fetchPunches();
    this.fetchTags();
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
      });
    },
    addPunch: function (e) {
      e.preventDefault();

      var start = moment(this.newPunch.start, 'HH:mm').format('X');
      if (start == "Invalid date") {
        alert('Start Time must be a valid time format. (e.g HH:mm)');
        $('#start').focus();
        return;
      }
      this.newPunch.start = start;
      var end = moment(this.newPunch.end, 'HH:mm').format('X');
      if (end == "Invalid date") {
        alert('End Time must be a valid time format. (e.g HH:mm)');
        $('#end').focus();
        return;
      }
      this.newPunch.end = end;

      this.newPunch.tags = $("#tags").select2("val");
      this.tags = this.tags.concat(this.newPunch.tags);
      this.punches.push(Vue.util.extend({}, this.newPunch));

      this.newPunch = {start: '', end: '', name: '', description: '', tags: ''};
      $("#tags").val('').change();
    }
  },
  filters: {
    getTime: function (unixTimestamp) {
      return moment(unixTimestamp, 'X').format('HH:mm');
    }
  }
});

$("#tags").select2({
  tags: true
});

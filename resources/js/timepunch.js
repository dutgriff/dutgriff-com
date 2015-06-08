new Vue({
  el: '#timepunch',

  data: {
    punches: [
      {
        start: '1433783700',
        end: '1433787300',
        name: 'Whatch Vue.js Laracast',
        description: 'Watched the Laracast series on Vue.js',
        tags: ['Learning', 'Vue.js', 'Laracast', 'PHP']
      },
      {
        start: '1433787300',
        end: '1433788200',
        name: "Rubik's Cube",
        description: "Play with my Rubik's Cube",
        tags: ['Logic', 'Puzzle', "Rubik's Cube"]
      }
    ],
    tags: ['Learning', 'Vue.js', 'Laracast', 'PHP', 'Logic', 'Puzzle', "Rubik's Cube", "Testing"],
    newPunch: {start: '', end: '', name: '', description: '', tags: ''}
  },

  methods: {
    addPunch: function (e) {
      e.preventDefault();

      var start = moment(this.newPunch.start, 'HH:mm').format('X');
      if(start == "Invalid date") {
        alert('Start Time must be a valid time format. (e.g HH:mm)');
        $('#start').focus();
        return;
      }
      this.newPunch.start = start;
      var end = moment(this.newPunch.end, 'HH:mm').format('X');
      if(end == "Invalid date") {
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
    getTime: function(unixTimestamp) {
      return moment(unixTimestamp, 'X').format('HH:mm');
    }
  }
});

$("#tags").select2({
  tags: true
});

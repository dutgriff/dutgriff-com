new Vue({
  el: '#timepunch',

  data: {
    columns: [
      {name: 'start', placeholder: 'start time'},
      {name: 'end', placeholder: 'end time'},
      {name: 'name', placeholder: 'name'},
      {name: 'description', placeholder: 'description'},
      {name: 'tags', placeholder: 'tags'}
    ],
    punches: [
      {
        start: '12:15',
        end: '13:15',
        name: 'Whatch Vue.js Laracast',
        description: 'Watched the Laracast series on Vue.js',
        tags: ['Learning', 'Vue.js', 'Laracast', 'PHP']
      },
      {
        start: '13:15',
        end: '13:30',
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

      this.newPunch.tags = $("#tags").select2("val");
      this.punches.push(Vue.util.extend({}, this.newPunch));

      this.newPunch = {start: '', end: '', name: '', description: '', tags: ''};
      $("#tags").val('').change();
    }
  }
});

$("#tags").select2({
  tags: true
});
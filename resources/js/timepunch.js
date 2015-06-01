    new Vue({
      el: '#timepunch',

      data: {
        columns: [
          {name: 'start', placeholder: 'start time'},
          {name: 'end', placeholder: 'end time'},
          {name: 'name', placeholder: 'name'},
          {name: 'description', placeholder: 'description'}, {name: 'tags', placeholder: 'tags'}
        ],
        punches: [
          {
            start: '12:15',
            end: '13:15',
            name: 'Whatch Vue.js Laracast',
            description: 'Watched the Laracast series on Vue.js',
            tags: ['learning', 'Vue.js', 'Laracast', 'PHP']
          },
          {
            start: '13:15',
            end: '13:30',
            name: "Rubik's Cube",
            description: "Play with my Rubik's Cube",
            tags: ['Logic', 'Puzzle', "Rubik's Cube"]
          }
        ],
        newPunch: {start: '', end: '', name: '', description: '', tags: ''}
      },

      methods: {
        addPunch: function(e) {
          e.preventDefault();

          this.punches.push(Vue.util.extend({}, this.newPunch));
        }
      }
    });
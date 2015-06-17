@extends('layout.master')

@section('content')
  <div id="timepunch">
    <h1>Time Punch</h1>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Name</th>
          <th>Description</th>
          <th>Tags</th>
        </tr>
      </thead>
      <tbody>
        <tr v-repeat="punch: punches | orderBy 'start'">
          <td>@{{ punch.start | formatTime }}</td>
          <td>@{{ punch.end | formatTime }}</td>
          <td>@{{ punch.name }}</td>
          <td>@{{ punch.description }}</td>
          <td>@{{ punch.tags | toTagNames }}</td>
        </tr>
      </tbody>
    </table>
    <form class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
      <div class="col-md-4">
        <div class="form-group">
          <label for="start">Start Time</label>
          <input
              type="text"
              class="form-control"
              id="start"
              placeholder="HH:mm"
              v-model="newPunch.start"/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="end">End Time</label>
          <input
              type='text'
              class="form-control"
              id="end"
              placeholder="HH:mm"
              v-model="newPunch.end"/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Name" v-model="newPunch.name"/>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" placeholder="Description"
                 v-model="newPunch.description"/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="tags">Tags</label>
          <a class="pull-right" v-class="hidden: creatingTag" v-on="click: creatingTag = true">new tag</a>
          <span class="pull-right" v-class="hidden: ! creatingTag">
            <a v-on="click: createTag()">create</a>
            |
            <a v-on="click: creatingTag = false">cancel</a>
          </span>
          <select class="form-control" multiple id="tags" v-model="newPunch.tags" v-class="hidden: creatingTag">
            <option v-repeat="tag: tags" value="@{{ tag.id }}">@{{ tag.name }}</option>
          </select>
          <input
              type="text"
              class="form-control"
              id="newTagName"
              v-class="hidden: ! creatingTag"
              placeholder="Tag name"
              v-model="newTag" />
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-default pull-right" v-attr="disabled: errors" v-on="click: addPunch">Create Punch</button>
      </div>
    </form>

    <pre style="clear:both; font-size:12px">@{{ $data | json }}</pre>
  </div>
@stop
@extends('layout.master')

@section('content')
  <div id="timepunch">
    <h1>Time Punch <span class="h3">(Demo)</span></h1>

    <div v-class="hidden: punches.length" class="well">
      <h3 class="text-center">There are currently no punches for today. Start throwing punches!</h3>
    </div>
    <table class="table table-striped" v-class="hidden: ! punches.length">
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
          <td>
            <ul class="list-inline tag-list">
              <li v-repeat="tag:punch.tags">@{{ tag | toTagName }}</li>
            </ul>
          </td>
        </tr>
      </tbody>
    </table>
    <form class="col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-3 well">
      @if( ! Auth::check())
        <div class="overlay">
          <span class="h2 overlay-message">You must be logged in to create a punch.</span>
        </div>
      @endif
        <div class="alert alert-danger" v-class="hidden: ! serverErrors.length" role="alert">
          <ul class="list-unstyled">
            <li v-repeat="message:serverErrors">@{{ message }}</li>
          </ul>
        </div>
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
      <div class="col-md-12">
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" placeholder="Description"
                 v-model="newPunch.description"/>
        </div>
      </div>
      <div class="col-md-12">
        <label for="tags">Tags</label>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group has-feedback">
              <input
                  type="text"
                  class="form-control"
                  id="tag"
                  v-model="tagInput"
                  placeholder="Tag name" />
              <span
                  class="glyphicon glyphicon-plus form-control-feedback text-success"
                  v-on="click: addTag(this.tagInput)"
                  style="pointer-events: auto;">
              </span>
            </div>
          </div>
          <div class="col-md-8">
            <button
                v-repeat="tag:newPunch.tags"
                class="btn btn-default"
                v-on="click: removeTag(tag)">
              <span class="glyphicon glyphicon-remove text-danger"></span>
              @{{ tag | toTagName }}
              </button>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-default pull-right" v-attr="disabled: errors" v-on="click: createPunch">Create Punch</button>
      </div>
    </form>
    <div class="row">
      <div class="col-xs-12">
        <h3>Up coming features:</h3>
        <ul>
          <li>Client side data validation.</li>
          <li>Layout fixes for screen sizes</li>
          <li>Tag picker dropdown/autocomplete</li>
          <li>Enter key shouldn't submit form.</li>
          <li>Enter key in tags field adds tag</li>
          <li>Punch pagination for those long day. (Don't abuse this please)</li>
          <li>Ability to view other dates</li>
          <li>Ability to edit punches</li>
          <li>Ability to edit tags</li>
        </ul>
      </div>
    </div>
  </div>
@stop
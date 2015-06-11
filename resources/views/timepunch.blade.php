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
        <tr v-repeat="punch: punches">
          <td>@{{ punch.start | getTime }}</td>
          <td>@{{ punch.end | getTime }}</td>
          <td>@{{ punch.name }}</td>
          <td>@{{ punch.description }}</td>
          <td>@{{ punch.tags }}</td>
        </tr>
        <tr>
          <td id="start-time" form="new-punch" class="form-group">
            <label class="sr-only" for="start">Start Time</label>
            <input
                type="text"
                class="form-control"
                id="start"
                placeholder="Start Time"
                v-model="newPunch.start"/>
          </td>
          <td id="end-time" form="new-punch" class="form-group">
            <label class="sr-only" for="end">End Time</label>
            <input
                type='text'
                class="form-control"
                id="end"
                placeholder="End Time"
                v-model="newPunch.end"/>
          </td>
          <td form="new-punch" class="form-group">
            <label class="sr-only" for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" v-model="newPunch.name"/>
          </td>
          <td form="new-punch" class="form-group">
            <label class="sr-only" for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description"
                   v-model="newPunch.description"/>
          </td>
          <td form="new-punch" class="form-group">
            <label class="sr-only" for="tags">Tags</label>
            <select class="form-control" multiple id="tags" v-model="newPunch.tags">
              <option v-repeat="tag: tags" value="@{{ tag.id }}">@{{ tag.name }}</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <form id="new-punch" class="form-inline" v-on="submit: addPunch">
      <button type="submit" class="btn btn-default pull-right">Punch</button>
    </form>

    <pre style="clear:both; font-size:12px">@{{ $data | json }}</pre>
  </div>
@stop
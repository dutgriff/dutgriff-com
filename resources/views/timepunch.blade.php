@extends('layout.master')

@section('content')
  <div id="timepunch">
    <h1>Time Punch</h1>

    <table class="table table-striped">
      <thead>
        <tr>
          <th v-repeat="column: columns">@{{ column.placeholder | capitalize }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-repeat="punches">
          <td>@{{ start }}</td>
          <td>@{{ end }}</td>
          <td>@{{ name }}</td>
          <td>@{{ description }}</td>
          <td>@{{ tags }}</td>
        </tr>
        <tr>
          <td form="new-punch" class="form-group" v-repeat="columns">
            <label class="sr-only" for="@{{ name }}">@{{ placeholder }}</label>
            <input type="text"
                   class="form-control"
                   id="@{{ name }}"
                   placeholder="@{{ placeholder }}"
                   v-model="newPunch[name]"
                />
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
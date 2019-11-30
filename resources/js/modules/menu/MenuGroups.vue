<template>
  <div class="menu-group__wrapper">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name &amp; Description</th>
          <th>Price</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(item, key) in items" :key="key">
          <td>
            <strong v-text="item.name"></strong>
            <p v-text="item.description"></p>
          </td>
          <td>{{item.price}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props:['items']
}
</script>


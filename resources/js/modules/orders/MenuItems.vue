<template>
  <ul class="list-group">
    <li class="list-group-item" v-for="(item, key) in items" :key="key">
      <div class="row">
        <div class="col-md-10">
          <strong>{{item.name}}</strong>
          <span class="float-right">{{item.price}}</span>
          <br>
          <small>{{item.category.name}}</small>
        </div>
        <div class="col-md-2">
          <span class="float-right">
            <button class="btn btn-sm btn-primary" @click="handleAddButtonClick(item)">Add</button>
          </span>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  props: ['items'],
  methods: {
    handleAddButtonClick(item) {
      window.eventBus.$emit('addMenuItem', item);
    }
  }
}
</script>

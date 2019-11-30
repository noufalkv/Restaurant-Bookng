<template>
  <div>
    <div v-if="items && items.length > 0">
      <ul class="list-group mb-3">
        <li class="list-group-item" v-for="(item, key) in items" :key="key">
          <div>
            <strong>{{item.name}}</strong>, <small>{{item.category.name}}</small>
            <span class="float-right">
              {{item.price}}
              <span class="ml-3 pointer" @click="handleRemoveItem(item)">X</span>
              </span>
          </div>
        </li>
      </ul>
    </div>

    <div v-else>
      <p>No items ordered yet</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['items'],
  methods: {
    handleRemoveItem(item) {
      window.eventBus.$emit('removeOrderedItem', item);
    }
  }
}
</script>

<template>
  <ul class="list-group">
    <li class="list-group-item" v-for="(orderDetail, key) in orderDetails" :key="key">
      {{orderDetail.name}} <span class="float-right">{{orderDetail.price}}</span>
    </li>
  </ul>
</template>

<script>
export default {
  props: ['orderDetails']
}
</script>

<template>
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Customer details</th>
        <th>Actions</th>
      </tr>
    </thead>

    <order-items :orders="orders.data"></order-items>
  </table>
</template>

<script>
import OrderItems from './../../components/OrderItems';
export default {
  props: ["orders"],
  components: {
    OrderItems
  }
};
</script>

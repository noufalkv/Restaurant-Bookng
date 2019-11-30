<template>
  <tbody>
    <tr v-for="order in orders" :key="order.id">
      <td>{{order.id}}</td>
      <td>{{order.amount}}</td>
      <td>{{(order.isComplete) ? 'Completed' : 'Incomplete'}}</td>
      <td>
        Name: {{order.order_details.customer_name}}
        <br>
        Phone: {{order.order_details.customer_phone}}
        <br>
        Address: {{order.order_details.customer_address}}
      </td>
      <td>
        <button class="btn btn-sm btn-success">Completed</button>
        <br>
        <br>
        <button class="btn btn-sm btn-warning">Cancel</button>
      </td>
    </tr>
  </tbody>
</template>

<script>
export default {
  props: ["orders"]
};
</script>

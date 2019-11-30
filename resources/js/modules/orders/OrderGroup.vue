<template>
  <div>
    <div class="row mb-3">
      <div class="col-md-12">
        <button @click="handleOrderSave" class="btn btn-success float-right">Save</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="mb-5">
          <h3>Customer details</h3>
          <OrderForm @customerDetailsChanged="customerDetailsHandle"></OrderForm>
        </div>

        <h3>Order details
          <span class="float-right" v-if="totalPrice > 0">{{totalPrice}}</span>
        </h3>
        <OrderList :items="orderedItems"></OrderList>
      </div>

      <div class="col-md-5">
        <h3>Menu items</h3>
        <OrderMenuItems :items="menuItems" @addMenuItem="handleNewMenuItem"></OrderMenuItems>
      </div>
    </div>
  </div>
</template>

<script>
import OrderForm from "./OrderForm";
import OrderList from "./OrderList";
import OrderMenuItems from "./OrderMenuItems";
import axios from "axios";

export default {
  props: ["restoId"],
  components: {
    OrderForm,
    OrderList,
    OrderMenuItems
  },
  created() {
    this.fetchMenuItems();
    window.eventBus.$on("addMenuItem", this.handleNewMenuItem);
    window.eventBus.$on("filteredList", this.handleFilteredList);
    window.eventBus.$on("clearFilteredList", this.handleClearFilteredList);
    window.eventBus.$on("clearFilteredList", this.handleClearFilteredList);
    window.eventBus.$on("removeOrderedItem", this.handleRemoveOrderedItem);
  },
  data() {
    return {
      menuItems: [],
      orderedItems: [],
      orginalMenuItems: [],
      customerDetails: null
    };
  },
  computed: {
    totalPrice() {
      let price = 0;
      this.orderedItems.forEach(item => {
        price = price + item.price;
      });
      return price;
    }
  },
  methods: {
    fetchMenuItems() {
      let postData = { restoId: this.restoId };
      axios
        .post("/api/menu-items", postData)
        .then(response => {
          this.menuItems = response.data;
          this.orginalMenuItems = response.data;
        })
        .catch(error => console.log("error", error.response));
    },
    handleNewMenuItem(menuItem) {
      this.orderedItems.unshift(menuItem);
    },
    handleFilteredList(filteredList) {
      this.menuItems = filteredList;
    },
    handleClearFilteredList() {
      this.menuItems = this.orginalMenuItems;
    },
    customerDetailsHandle(customer) {
      this.customerDetails = customer;
    },
    handleRemoveOrderedItem(item) {
      this.orderedItems = this.orderedItems.filter(orderedItem => orderedItem.id != item.id);
    },
    handleOrderSave() {
      let orderedItemsIds = [];
      this.orderedItems.forEach(item => {
        orderedItemsIds.push(item.id);
      });
      let orderData = {
        resto_id: this.restoId,
        order_data: {
          customerDetails: this.customerDetails,
          totalPrice: this.totalPrice,
          orderedItems: orderedItemsIds
        }
      };

      console.log(orderData);
      axios.post('/api/order/save', orderData).then(response => console.log('response', response));
    }
  }
};
</script>

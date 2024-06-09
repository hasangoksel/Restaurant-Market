<template>
  <market></market>
</template>
<script>
import Market from './layouts/Market.vue';
import Restaurant from './layouts/Restaurant.vue'
import Welcome from './layouts/Welcome.vue'
export default{
  components:{
    'welcome': Welcome,
    'restaurant': Restaurant,
    'market': Market
  }
}
</script>
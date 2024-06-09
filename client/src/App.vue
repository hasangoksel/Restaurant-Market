<template>
  <lore-user></lore-user>
</template>
<script>
import LoReUser from './layouts/LoReUser.vue';
import Market from './layouts/Market.vue';
import Restaurant from './layouts/Restaurant.vue'
import Welcome from './layouts/Welcome.vue'
export default{
  components:{
    'welcome': Welcome,
    'restaurant': Restaurant,
    'market': Market,
    'lore-user': LoReUser
  }
}
</script>
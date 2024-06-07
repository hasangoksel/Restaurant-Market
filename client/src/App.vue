<template>
  <restaurant></restaurant>
</template>
<script>
import Restaurant from './layouts/Restaurant.vue'
import Welcome from './layouts/Welcome.vue'
export default{
  components:{
    'welcome': Welcome,
    'restaurant': Restaurant
  }
}
</script>
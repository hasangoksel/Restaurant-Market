<template>
  <restaurant></restaurant>
</template>
<script>
import Navbar from './components/Navbar.vue';
import Restaurant from './layouts/Restaurant.vue'
import Welcome from './layouts/Welcome.vue'
export default{
  components:{
    'welcome': Welcome,
    'restaurant': Restaurant,
    'navbar': Navbar
  }
}
</script>